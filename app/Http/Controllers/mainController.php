<?php

namespace App\Http\Controllers;

use App\State;
use App\Tbl_countries;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index()
    {
    	$countries = Tbl_countries::all()->pluck('name','id');
    	return view('ajaxForm',compact('countries'));
    }

    public function getStates($id)
    {
    	$states = State::where('country_id', $id)->pluck('name','id');
    	return json_encode($states);
    }
}
