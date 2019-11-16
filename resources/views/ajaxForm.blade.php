<!DOCTYPE html>
<html>
<head>
	<title>AjaxForm</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center">Ajax Contact Form</h3>

				<form action="{{ route('contact.store') }}" method="POST">
					@csrf
					<div class="form-group row">
						<label for="firstname" class="col-sm-4 col-form-label text-right">First Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="firstname" id="firstname" placeholder="fname" value="" required>					
						</div>
					</div>

					<div class="form-group row">
						<label for="lastname" class="col-sm-4 col-form-label text-right">Last Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="lastname" id="lastname" placeholder="lname" value="" required>					
						</div>
					</div>

					<div class="form-group row">
						<label for="dob" class="col-sm-4 col-form-label text-right">DateOfBirth</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="dob" id="dob" placeholder="" value="" required>				
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-4 col-form-label text-right">Email</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="yourmail@exmple.com" value="" required>				
						</div>
					</div>

					<!-- Take country data from database -->
					<div class="form-group row">
						<label for="country" class="col-sm-4 col-form-label text-right">Country</label>
						<div class="col-sm-4">
							<select class=" form-control" name="country" id="country" onchange="">
								<option value="">Select Country</option>

								@foreach($countries as $key => $value)
								<option value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- Take city data from database -->
					<div class="form-group row">
						<label for="state" class="col-sm-4 col-form-label text-right">State</label>
						<div class="col-sm-4">
							<select class=" form-control statecategory" name="state" id="state" value="">
								<option value="">Select State</option>

							</select>
						</div>
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-round btn-success">Submit</button>
						<!-- <a href="{{route('contact.index')}}" class="btn btn-warning">Back</a> -->

					</div>

				</form>

			</div>
		</div>
	</div>	

	<script src="{{asset('js/jquery.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('select[name="country"]').on('change', function(){
				var country_id = $(this).val();
				if(country_id){
					// console.log(country_id);
					$.ajax({
						url: '/getStates/'+country_id,
						type: 'GET',
						dataType: 'json',
						success: function(data){
							console.log(data);

							$('select[name="state"]').empty();
							$.each(data, function(key, value){
								$('select[name="state"]')
								.append('<option value="'+key+'">'+value+'</option>');
							});
						}
					});
				} else {
					$('select[name="state"]').empty();
				}
			});
		});
	</script>

</body>


</html>