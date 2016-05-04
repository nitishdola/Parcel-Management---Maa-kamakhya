<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tender, App\Department, App\TenderType;

use Validator, Redirect, Auth;

class TendersController extends Controller
{
    public function adminCreate() {
        $tender_types    = [''=>'Select Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $departments    = [''=>'Select Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('admin.tenders.create', compact('departments', 'tender_types'));
    }

    public function store(Request $request){
        $validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');
        $added_by = Auth::user()->id;
        $message = $this->storeTender($request, $added_by);
        
        return Redirect::route('tender.index')->with('message', $message);
    }

    public function admin_store(Request $request){
        $validator = Validator::make($data = $request->all(), Tender::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput()->with('message', 'Some fields has errors. Please correct it and then try again');
        $added_by = Auth::guard('admin')->user()->id;
        $message = $this->storeTender($request, $added_by);
        
        return Redirect::route('tender.index')->with('message', $message);
    }

    private function storeTender($request = array(), $added_by) {

       $data = $request->all();
       
       if ($request->hasFile('nit')) {
            if ($request->file('nit')->isValid()){
                $nit_path = 'uploads/nit/'.date('Y-m-d');
                $destination_path = public_path( $nit_path );
                $fileName = $request->tender_id.'-'.time().'_nit.'.$request->file('nit')->getClientOriginalExtension();
                $request->file('nit')->move($destination_path, $fileName);
                $data['nit'] = $nit_path.'/'.$fileName;
            }
        }

        if ($request->hasFile('tender')) {
            if ($request->file('tender')->isValid()){
                $tender_path = 'uploads/tender/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_tender.'.$request->file('tender')->getClientOriginalExtension();
                $request->file('tender')->move($destination_path, $fileName);
                $data['tender'] = $tender_path.'/'.$fileName;
            }
        }

    
        $data['issue_from'] = date('Y-m-d H:i:s', strtotime($request->issue_from));
        $data['issue_to']   = date('Y-m-d H:i:s', strtotime($request->issue_to));
        $data['receipt_of_offer']       = date('Y-m-d H:i:s', strtotime($request->receipt_of_offer));
        $data['tender_opening_date']    = date('Y-m-d H:i:s', strtotime($request->tender_opening_date));
        $data['added_by'] = $added_by;
        $message = '';
        if(Tender::create($data)) {
            $message .= 'Tender created successfully !';
        }else{
            $message .= 'Unable to add tender!';
        } 

        return $message;
    }

    public function search_tender() {
        $department_id = $tender_type_id = null;
        $departments    = [''=>'All Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender_types    = [''=>'All Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        return view('tenders.search_tender', compact('tender_types', 'departments', 'department_id', 'tender_type_id'));
    }

    public function tender_search_result(Request $request) {
        
        $departments    = [''=>'All Department'] + Department::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $tender_types    = [''=>'All Tender Type'] + TenderType::whereStatus(1)->orderBy('name')->lists('name', 'id')->toArray();
        $department_id = $tender_type_id = NULL;
        $matchThese = [];
        if($request->department_id != '') {
            $matchThese['department_id'] = $department_id = $request->department_id;
        }
        if($request->tender_type_id != '') {
            $matchThese['tender_type_id'] = $tender_type_id = $request->tender_type_id;
        }

        $results = Tender::where($matchThese)->with('department', 'tender_type')->orderBy('tender_opening_date', 'DESC')->paginate(20);
        return view('tenders.tender_search_result', compact('tender_types', 'departments', 'results', 'department_id', 'tender_type_id'));
    }

    public function details($id = NULL) {
        $details = Tender::where('id', $id)->with('department', 'tender_type')->first();
        return view('tenders.details', compact('details'));
    }

    public function addCorrigendum() {
        $tenders    = [''=>'Select Tender ID'] + Tender::whereStatus(1)->orderBy('created_at', 'DESC')->lists('tender_id', 'id')->toArray();
        return view('tenders.add_corrigendum', compact('tenders'));
    }

    public function storeCorrigendum(Request $request) {
        if ($request->hasFile('corrigendum')) {
            $tender_id = $request->tender_id;
            $tender = findOrFail($tender_id);

            if ($request->file('corrigendum')->isValid()){
                $tender_path = 'uploads/corrigendum/'.date('Y-m-d');
                $destination_path = public_path( $tender_path );
                $fileName = $request->tender_id.'-'.time().'_corrigendum.'.$request->file('corrigendum')->getClientOriginalExtension();
                $request->file('corrigendum')->move($destination_path, $fileName);  
                $tender->corrigendum = $tender_path.'/'.$fileName;
                $tender->save();
                $message = 'Corrigendum uploaded successfully'; 
                return Redirect::route('tender.index')->with('message', $message);
            }
        }else{
            $message = 'No file selected'; 
            return Redirect::route('corrigendum_tender.create')->with('message', $message);
        }
    }
}
