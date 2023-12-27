<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;

use App\Models\Candidate;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class CandidateController extends Controller
{
    public function index(request $request)
    {  
      $datas = DB::table('candidate')
      ->join('users','candidate.owner','=','users.id')
      ->select('candidate.first_name','candidate.last_name','candidate.city','candidate.state',
      'candidate.key_skills','candidate.date_created','candidate.date_modified','users.user_name')
      ->get();
      return view('candidates.index', compact('datas'));
    }
    
      public function create()
    {      
        if (\Auth::user()->can('create-user')) {  

        $roles = Role::pluck('name', 'name')->all();
        return view('candidates.create', compact('roles'));
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }
    }


    public function store(Request $request)
    {    
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email1' => 'required|email|unique:candidate,email1',
            'phone_cell' => 'required|unique:candidate,phone_cell',
            // 'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);
        // $role_r = Role::findByName($request->roles);
        $user   = DB::table('candidate')->insert(
            [
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'last_name' => $request['last_name'],
                'email1' => $request['email1'],
                'email2' => $request['email2'],
                'web_site' => $request['web_site'],
                'phone_home' => $request['phone_home'],
                'phone_cell' => $request['phone_cell'],
                'phone_work' => $request['phone_work'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'zip' => $request['zip'],
                'best_time_to_call' => $request['best_time_to_call'],
                'can_relocate' => $request['can_relocate'],
                'date_available' => $request['date_available'],
                'current_employer' => $request['current_employer'],
                'current_pay' => $request['current_pay'],
                'desired_pay' => $request['desired_pay'],
                'source' => $request['source'],
                'key_skills' => $request['key_skills'],
                'notes' => $request['notes']
           ]
        );
       return redirect()->route('candidates.index')
            ->with('success', __('Candidate created successfully'));
    }
}
