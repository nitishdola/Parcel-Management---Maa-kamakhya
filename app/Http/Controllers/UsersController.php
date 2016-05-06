<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Validator, Redirect, DB;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   	}

   	public function create() {
   		return view('master_entries.users.create');
   	}

   	public function store(Request $request) {
     		$rules = [
     			'name' 		=> 'required|min:2|max:255',
  		    'username' 	=> 'required|min:2|max:255|unique:users,username,:id',
  		    'password' 	=> 'required|max:255',
  	    ];
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $user = new User;

        $user->name 	= $request->get('name');
  	    $user->username = $request->get('username');
  	    $user->password = bcrypt( $request->get('password') );

        $message = '';
        
        if($user->save()) {
               	$message .= 'Operator added successfully !';
    		}else{
    			$message .= 'Failed !';
    		}


        return Redirect::route('users.list_all')->with('message', $message);
    }

    public function index() {
    	$results = DepartmentUser::with('user', 'department')->paginate(20);
    	return view('master_entries.users.list_all', compact('results'));
    }
}
