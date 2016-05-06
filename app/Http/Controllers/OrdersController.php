<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Redirect,DB, Session, Auth, Input;
use App\State, App\City;

use App\Order;

class OrdersController extends Controller
{
    public function adminCreate() {
    	$cities = [''=>'Select City'] + City::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('admin.orders.create', compact('cities'));
    }

    public function admin_store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Order::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

    	$message = '';
    	$data['date'] = date('Y-m-d', strtotime($request->date));

        if($order = Order::create($data)) {
            $message .= 'Order created added successfully !';
         }else{
           $message .= 'Unable to add order !';
         }

        return Redirect::route('admin.order.view', $order->id)->with('message', $message);
    }

    public function view($id) {
    	$result = Order::whereId($id)->with('from_city', 'to_city')->first();
    	return view('admin.orders.view', compact('result'));
    }

    public function process($id) {
        $order = Order::findOrfail($id);
        $order->processed = 1;
        $order->process_date = date('Y-m-d H:i:s');
        $order->save();
        $message = 'Order Dispatched !';
        return Redirect::route('order.index')->with('message', $message);
    }

    public function view_all() {
        return 'View All';
    }

    public function stock_search() {
        $cities = [''=>'All'] + City::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('orders.stock_search', compact('cities'));
    }

    public function stock_search_result(Request $request) {
        $where = [];
        
        $date_from  = '1970-01-01';
        $date_to    = date('Y-m-d');

        if($request->from) {
            $where['from'] = $request->from;
        }
        if($request->to) {
            $where['to'] = $request->to;
        }

        $result = Order::where($where)->where('date', '>=', $date_from)->where('date', '<=', $date_to)->get();

        $stock_in = $stock_out = 0;

        $stock_in_obj = Order::where($where)->where('date', '>=', $date_from)->where('date', '<=', $date_to)->with('from_city', 'to_city');

        
        $stock_out_obj = Order::where($where)->where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('processed', 1)->with('from_city', 'to_city');

        $stock_in = $stock_in_obj->count();
        $stock_ins = $stock_in_obj->get();


        $stock_out = $stock_out_obj->count();
        $stock_outs = $stock_out_obj->get();
       
        return view('orders.stock_search_result', compact('stock_in', 'stock_out', 'result', 'stock_ins', 'stock_outs'));
    }
}
