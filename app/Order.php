<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('c_number','date', 'from', 'to', 'consignor', 'no_of_packages', 'weight', 'freight_charge', 'insurance_charge', 'sc_charge', 'grand_total', 'consignee', 'paid', 'status');
	protected $table    = 'orders';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'c_number' 		=>  'required',
    	'date'  		=>  'required|date',
    	'from'  	    =>  'required|exists:cities,id',
    	'to'  	    	=>  'required|exists:cities,id',
    	'consignor' 	=>  'required',
    	'no_of_packages'=>  'required|numeric|min:0',
        'weight'  		=>  'required|numeric|min:0',
        'freight_charge'=>  'numeric|min:0',
        'insurance_charge'=> 'numeric|min:0',
        'sc_charge'  	=>  'numeric|min:0',
        'grand_total'  	=>  'required|numeric|min:0',
        'consignee' 	=>  'required',
        'paid'          =>  'required',
      ];

    public function from_city()
    {
      return $this->belongsTo('App\City', 'from');
    }

    public function to_city()
    {
      return $this->belongsTo('App\City', 'to');
    }
}
