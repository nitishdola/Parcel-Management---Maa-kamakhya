<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = array('name');
	protected $table    = 'cities';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 		=>  'required',
    	'state_id'  =>  'required|exists:states,id',
    	];
}
