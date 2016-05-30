<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoadingInfo extends Model
{
    protected $fillable = array('order_id','package_received', 'package_transportation_method', 'paid', 'remarks', 'loading_date');
	protected $table    = 'loading_infos';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'order_id'  	    				=>  'required|exists:orders,id',
    	'package_received'  	    		=>  'required|in:yes,no',
    	'package_transportation_method' 	=>  'required|in:truck,train',
    	'loading_date'						=>  'required|date_format:d-m-Y',
        'remarks' 							=>  'required',
        'paid'          					=>  'required|in:yes,no',
      ];

    public function orders()
    {
      return $this->belongsTo('App\Order', 'order_id');
    }
}
