<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Controllers\Controller;
use App\State;
use App\Tbl_countries;
use Illuminate\Http\Request;

class contactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Tbl_countries::all()->pluck('name','id');
        return view('contactForm',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates($id)
    {
        $states = State::where('country_id', $id)->pluck('name','id');
        return json_encode($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
     $contact = $request->validate([
         'firstname' => 'required',
         'lastname' => 'required',
     ]);

     $contact = new Contact;
     $contact->firstname = $request->firstname;
     $contact->lastname = $request->lastname;
     $contact->dob = $request->dob;
     $contact->email = $request->email;
     $contact->country = $request->country;
     $contact->state = $request->state;

     $contact->save();

     return redirect('/contact');

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
