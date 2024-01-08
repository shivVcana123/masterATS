<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\Company;
use App\Models\Contact;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with('companies','ownerUser')->get();
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::get();
        return view('contacts.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = array_merge($request->all(),[
            'entered_by' => Auth::user()->id,
            'owner' => Auth::user()->id,
            'is_hot' => $request->has('is_hot') ? 1 : 0,
          ]);

        $contacts = Contact::create($data);

        if( $contacts){
            return response()->json(['status' => true, 'message' => 'Contect create successfully.','data' => $contacts]);
        }else{
            return response()->json(['status' => false, 'message' => 'Somthing went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactDetails = Contact::with('companies','ownerUser')->find($id);
        return view('contacts.show',compact('contactDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactEditDetails = Contact::with('companies','ownerUser')->find($id);
        return view('contacts.edit',compact('contactEditDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactsUpdateData(Request $request)
    {
        $contactEditDetails = Contact::find($request->contact_id)->update($request->all());
        
        if( $contactEditDetails){
            return response()->json(['status' => true, 'message' => 'Contect updated successfully.','data' => $contactEditDetails]);
        }else{
            return response()->json(['status' => false, 'message' => 'Somthing went wrong.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactDelete($id)
    {
        $contacted = Contact::find($id)->delete();
        
        if( $contacted){
            return response()->json(['status' => true, 'message' => 'Contect deleted successfully.']);
        }else{
            return response()->json(['status' => false, 'message' => 'Somthing went wrong.']);
        }
    }
}