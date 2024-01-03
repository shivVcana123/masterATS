<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\Activity;
use Carbon\Carbon;

use App\Models\Candidate;
use App\Models\CandidateJoborder;
use App\Models\SavedList;
use App\Models\SavedListEntry;
use App\Models\User;
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
      $datas = DB::table('candidates')
      ->join('users','candidates.owner','=','users.id')
      ->select('candidates.id','candidates.first_name','candidates.last_name','candidates.city','candidates.state',
      'candidates.key_skills','candidates.date_created','candidates.date_modified','users.user_name')
      ->get();
      return view('candidates.index', compact('datas'));
    }
    
    public function create()
    {      
        if (\Auth::user()->can('create-user')) {  
            $roles = Role::pluck('name', 'name')->all();
            return view('candidates.create', compact('roles'));
        }
    
        return redirect()->back()->with('error', 'Permission denied.');
    }
    


    public function store(Request $request)
    {    
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email1' => 'required|email|unique:candidate,email1',
            'phone_cell' => 'required|unique:candidates,phone_cell',
            // 'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);
        // $role_r = Role::findByName($request->roles);
        $user = DB::table('candidates')->insert(
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
                'owner' => Auth::user()->id,
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

    public function candidatesDetails($id){
        $candidatesDetails = Candidate::where('id',$id)->get();
        $candidatesJobOrderDetails = CandidateJoborder::with('candidatesDetails','users','joborderDetails','joborderDetails.companies','activities','activities.activityTypes')->get();
        // dd( $candidatesJobOrderDetails);
        $savedList = SavedList::where('number_entries','1')->get();
        return view('candidates.show',compact('candidatesDetails','savedList','candidatesJobOrderDetails'));
    }

    public function candidatesUpdate($id){
        $candidatesDetails = Candidate::where('id',$id)->get();
        // dd( $candidatesDetails);
        return view('candidates.profile',compact('candidatesDetails'));
    }

    public function candidatesUpdateSave(Request $request){
        // dd($request->all());
        $existingCompany = Candidate::where('id',$request->id);

        if ($existingCompany) {
            $existingCompany->update($request->except(['_token']));

            return response()->json(['status' => true, 'message' => 'Data updated successfully.', 'data' => $existingCompany]);
        } else {
            return redirect()->back()->with('error', 'Candidate not found.');
        }

    }

    // public function candidatesListSave(Request $request){
        
    //     $existsName = SavedList::where('description', $request->description)->get();

    //     if ($existsName->isEmpty()) {
    //         $savedList = SavedList::find($request->list_id);
        
    //         if ($savedList === null) {
    //             SavedList::create([
    //                 'description' => $request->description,
    //                 'data_item_type' => $request->data_item_type,
    //             ]);
        
    //             return response()->json(['status' => true, 'message' => 'Data created successfully.','data'=> $savedList]);
    //         } else {
    //             $savedList->update([
    //                 'description' => $request->description,
    //                 'data_item_type' => $request->data_item_type,
    //             ]);
        
    //             return response()->json(['status' => true, 'message' => 'Data updated successfully.','data'=> $savedList]);
    //         }
    //     } else {
    //         return response()->json(['status' => false, 'message' => 'That name is already in use, please try another.']);
    //     }
        
    // }
public function candidatesListSave(Request $request){

    $savedList = SavedList::find($request->list_id);

    if ($savedList === null) {
        SavedList::create([
            'id' => $request->list_id,
            'description' => $request->description,
            'data_item_type' => $request->data_item_type,
            'created_by' => Auth::user()->id,
        ]);

        return response()->json(['status' => true, 'message' => 'Data created successfully.', 'data' => $savedList]);
    } else {
        $savedList->update([
            'description' => $request->description,
            'data_item_type' => $request->data_item_type,
        ]);

        return response()->json(['status' => true, 'message' => 'Data updated successfully.', 'data' => $savedList]);
    }
}


    public  function candidatesListDelete($id){
  
        $deleteFromList = Candidate::find($id)->delete();
        if ($deleteFromList) {
            // return response()->json(['status' => true, 'message' => 'Data deleted successfully.']);
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Somthing went wrong.');
        }
    }


    public function candidatesListSaveEntry(Request $request){
        // dd($request->all());

        
        $selectedListIds = $request->input('selectedListIds');

        foreach ($selectedListIds as $selectedList) {
            // Assuming the first element is 'list_id' and the second is 'data_item_type'
            $list_id = $selectedList[0];
            $data_item_type = $selectedList[1];
    
            // Save the data to the SavedList model
            $result = SavedListEntry::create([
                'saved_list_id' => $list_id,
                'data_item_type' => $data_item_type,
                // Add other columns as needed
            ]);
            SavedList::where('id',$list_id)->update(['number_entries' => '1', ]);
        }

        if($result){
            return response()->json(['status' => true, 'message' => 'Data saved successfully.']);
        }else{
            return response()->json(['status' => false, 'message' => 'Somthing went wrong.']);
        }
    
       
    }

    public function candidatesActivityDelete($id){

        $activityDelete = Activity::find($id)->delete();

        if($activityDelete){
            return response()->json(['status' => true, 'message' => 'Data deleted successfully.']);
        }else{
            return response()->json(['status' => false, 'message' => 'Somthing went wrong.']);
        }
    }
}