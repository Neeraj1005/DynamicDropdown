<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_countries extends Model
{
        //Table Name
	protected $table = 'tbl_countries';
    //Primary key
	public $primaryKey = 'id';
    //Timestamps
	public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'sortname', 'name'];


    public function contact() 
    {
        return $this->hasMany('App\State','id');
    }

}
