<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = array('name');
	protected $table    = 'states';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 		=>  'required',
    	];
}
