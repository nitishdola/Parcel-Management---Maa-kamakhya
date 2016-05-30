<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Redirect,DB, Session, Auth, Input;
use App\State, App\City;

use App\Order;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::paginate(20);
        return view('admin.orders.index', compact('orders'));
    }
    public function adminCreate() {
    	$cities = [''=>'Select City'] + City::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $c_number = $this->getLatestCNNumber();
        $new_cnumber = $c_number+1;
        return view('admin.orders.create', compact('cities', 'new_cnumber'));
    }

    private function getLatestCNNumber() {
        $order = Order::orderBy('id', 'DESC')->first();
        return $order->c_number;
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

    public function receive() {
        $orders = Order::with('from_city', 'to_city')->where('received', 0)->paginate(20);
        return view('orders.receive', compact('orders'));
    }

    public function receive_item($id) {
        $order = Order::findOrFail($id);
        $order->received = 1;
        $order->receive_date = date('Y-m-d H:i:s');
        $order->save();
        $message = 'Parcel Received !';
        return Redirect::route('order.dispatch')->with('message', $message);
    }

    public function dispatch_orders() {
        $orders = Order::with('from_city', 'to_city')->where('received', 1)->where('processed', 0)->paginate(20);
        return view('orders.dispatch_orders', compact('orders'));
    }

    public function process($id) {
        $order = Order::findOrfail($id);
        if($order->received) {
            $order->processed = 1;
            $order->process_date = date('Y-m-d H:i:s');
            $order->save();
            $message = 'Parcel Dispatched !';
            return Redirect::route('order.dispatch')->with('message', $message);
        }else{
            $message = 'Parcel Not yet received !';
            return Redirect::route('order.receive')->with('message', $message);
        }
        
    }

    public function view($id) {
    	$result = Order::whereId($id)->with('from_city', 'to_city')->first();
    	return view('admin.orders.view', compact('result'));
    }

    

    public function view_all() {
        $orders = Order::paginate(20);
        return view('orders.view_all_orders', compact('orders'));
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

        $stock_in_obj = Order::where($where)->where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('received', 1)->where('processed', 0)->with('from_city', 'to_city');

        
        $stock_out_obj = Order::where($where)->where('date', '>=', $date_from)->where('date', '<=', $date_to)->where('processed', 1)->with('from_city', 'to_city');

        $stock_in = $stock_in_obj->count();
        $stock_ins = $stock_in_obj->get();


        $stock_out = $stock_out_obj->count();
        $stock_outs = $stock_out_obj->get();
       
        return view('orders.stock_search_result', compact('stock_in', 'stock_out', 'result', 'stock_ins', 'stock_outs'));
    }

    public function add_refund() {
        $orders = [''=>'Select Order'] + Order::orderBy('created_at', 'DESC')->lists('c_number', 'id')->toArray();
        return view('admin.orders.add_refund', compact('orders'));
    }

    public function post_refund(Request $request) {
        $order = Order::findOrFail($request->order_id);
        $order->refund_amount = $request->refund_amount;
        $order->save();

        $message = 'Refund Added !';
        return Redirect::route('admin.order.index')->with('message', $message);
    }

    public function make_paid($id) {
        $order = Order::findOrFail($id);
        if($order->paid == 'yes') return 'Already Paid !';
        return view('orders.make_paid', compact('order', 'id'));
    }

    public function post_paid(Request $request) {
        $order = Order::findOrFail($request->id);

        $order->freight_charge      = $request->freight_charge;
        $order->insurance_charge    = $request->insurance_charge;
        $order->sc_charge           = $request->sc_charge;
        $order->grand_total         = $request->grand_total;
        $order->paid                = 'yes';
        $order->save();
        $message = 'Amount Paid';

        return Redirect::route('order.user_view', $order->id)->with('message', $message);
    }

    public function user_view($id) {
        $result = Order::whereId($id)->with('from_city', 'to_city')->first();
        return view('orders.view', compact('result'));
    }
}
