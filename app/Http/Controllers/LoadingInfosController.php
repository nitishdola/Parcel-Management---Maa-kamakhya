<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order, App\LoadingInfo;
use Validator, Redirect,DB, Session, Auth, Input;

class LoadingInfosController extends Controller
{
    public function create() {
    	$orders = [''=>'Select Order'] + Order::orderBy('created_at', 'DESC')->lists('c_number', 'id')->toArray();
    	return view('admin.loading_infos.create', compact('orders'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), LoadingInfo::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

    	$message = '';

    	$data['loading_date'] = date('Y-m-d', strtotime( $data['loading_date'] ));
        if($order = LoadingInfo::create($data)) {
            $message .= 'Order loading info added successfully !';
        }else{
           $message .= 'Unable to add order loding info !';
        }

        return Redirect::route('admin.loading.index')->with('message', $message);
    }

    function index() {
    	$results = LoadingInfo::orderBy('created_at', 'DESC')->with('orders')->paginate(30);
    	return view('admin.loading_infos.index', compact('results'));
    }
}
