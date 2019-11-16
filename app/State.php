<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	// Table Name
	protected $table = 'states';
    //Primary key
	public $primaryKey = 'id';
    //Timestamps
	public $timestamps = true;


	protected $fillable = ['id', 'name', 'country_id'];

	public function contact()
	{
		return $this->belongsTo('App\Tbl_countries','country_id');
	}
}
