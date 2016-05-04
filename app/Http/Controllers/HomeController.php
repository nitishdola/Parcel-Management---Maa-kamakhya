<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User, App\Department, App\DepartmentUser, App\TenderType;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $department_id = DepartmentUser::where('user_id', $user_id)->first()->department_id;
        $tender_types    = [''=>'Select Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $departments    = [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('home', compact('department_id', 'tender_types', 'departments'));
    }
}