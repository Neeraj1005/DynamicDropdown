<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	    //Table Name
    protected $table = 'contacts';

       //Primary key
    public $primaryKey = 'id';


    protected $fillable = [
        'firstname', 'lastname', 'email',
    ];


    public function tbl_countries() 
    {
        return $this->belongsTo('App\Tbl_countries','name');
    }

    public function states() 
    {
        return $this->belongsTo('App\State','name');
    }
}
