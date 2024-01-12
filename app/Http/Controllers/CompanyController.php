<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\Attachment;
use App\Models\Company;
use App\Models\User;
use DateTime;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class CompanyController extends Controller
{
    public function index(request $request, $letter = null)
    {  

      // $query = Company::with('user');
      $query = Company::with(['ownerUser', 'jobDetails'])
      ->withCount('jobDetails');
          // Check if 'letter' parameter is present and apply the filter
          if ($request->has('letter')) {
              $query->where('companies.company_name', 'like', $request->input('letter').'%');
          }
          // Check if 'search' parameter is present and apply the filter
          if ($request->has('search')) {
              $searchTerm = $request->input('search');
              $query->where(function ($query) use ($searchTerm) {
                  $query->where('companies.company_name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('users.user_name', 'like', '%'.$searchTerm.'%');
              });
          }
          $datas = $query->get();


      return view('companies.index', compact('datas', 'letter','request'));
    
    }

    public function create($company_id = null){
      $company = Company::where('owner',Auth::user()->id)->get();
      return view('companies.create',compact('company_id','company'));
    }


    public function store(Request $request){

      // dd($request->all());
      $request->validate([
        'company_name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'primary_phone' => 'required',
        'secondary_phone' => 'required',
        'zip' => 'required',
        'web_url' => 'required',
        'key_technologies' => 'required',
        'notes' => 'required',
        'fax_number' => 'required',
    ]);

    $data = array_merge($request->all(),[
      'owner' => Auth::user()->id,
      'is_hot' => $request->has('is_hot') ? 1 : 0,
    ]);
   
      $data = Company::create($data);

      if($data){
        return response()->json(['status' => true,'message' => 'Company created successfully.','data' => $data]);
      }else{
        return redirect()->back()->with('error','Somthing went wrong.');
      }
    }

    public  function profiledetails($id){

      $ageDays = [];
      $currentDate = new DateTime();
      
      $companyDetails = Company::with('jobDetails.candidateJoborder','jobDetails','contacts','jobDetails.ownerUser','jobDetails.recruiterUser','ownerUser')->where('id',$id)->get();

      $attachments = Attachment::with('attachable')
      ->where('attachable_id',$id)
      ->where('attachable_type', Company::class)
      ->get();
      // Initialize $key before the loop
      $key = null;

      foreach ($companyDetails[0]['jobDetails'] as $key => $jobDetail) {
          $startDate = new DateTime($jobDetail->start_date);
          $daysDifference = $startDate->diff($currentDate)->format('%a');
          $ageDays[$jobDetail->id] = $daysDifference;
      }

      // Make sure $key is defined even if the loop doesn't run
      if (!is_null($key)) {
          $companyDetails[0]['jobDetails'][$key]['ageDays'] = $ageDays;
      }


      return view('companies.show',compact('companyDetails','attachments'));
      
    }

    public function updatedetails($id){
      $companyDetails = Company::with('companyDepartment')->where('id',$id)->get();
      // dd($companyDetails);
      $users = User::get();
      return view('companies.profile',compact('companyDetails','users'));
    }

    public function companiesUpdateSave(Request $request)
    {
        $request->validate([
          // 'company_name' => 'required',
          'address' => 'required',
          'city' => 'required',
          'state' => 'required',
          'zip' => 'required',
          'primary_phone' => 'required',
          'secondary_phone' => 'required',
          'web_url' => 'required',
          'key_technologies' => 'required',
          'notes' => 'required',
          'fax_number' => 'required',
      ]);
      
  
      $existingCompany = Company::where('id', $request->id);
      $existingCompany->update($request->all());
      if ($existingCompany !== false) {
        return response()->json(['status' => true,'message' => 'Data updated successfully.','data' => $existingCompany]);
      } else {
          return redirect()->back()->with('error', 'Something went wrong.');
      }
      
    }
    

    public function delete($id){
      $delete = Company::where('id', $id)->delete();
      if ($delete) {
      return response()->json(['status' => true,'message' => 'Data deleted successfully.']);
      } else {
          return redirect()->back()->with('error', 'Something went wrong.');
      }
    }
    

    public function companyHistory($id){

      $companyHistory = Company::where('id', $id)->get();

      return view('companies.show_history',compact('companyHistory'));
    }
}