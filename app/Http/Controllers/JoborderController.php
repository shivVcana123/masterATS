<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\ActivityType;
use App\Models\calendarEvenType;
use App\Models\Candidate;
use App\Models\CandidateJoborder;
use App\Models\ChangeStatus;
use App\Models\Joborder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Models\Company;
use App\Models\SavedList;
use App\Models\User;

class JoborderController extends Controller
{
    
// public function create(Request $request)
// {
   
    //     $jobOrder = new JobOrder();
        
    //     $jobOrder->title = $request->input('title');
    //     $jobOrder->start_date = $request->input('start date');
    //     $jobOrder->end_date = $request->input('end_date');
    //     $jobOrder->age = $request->input('age');
    //     $jobOrder->perposal = $request->input('perposal');
    //     $jobOrder->id = $request->input('id');
    //     $jobOrder->end_date = $request->input('end_date');
    //     $jobOrder->joborder_id	 = $request->input('joborder_id');
    //     $jobOrder->recruiter = $request->input('recruiter');
    //     $jobOrder->contact_id = $request->input('contact_id');
    //     $jobOrder->entered_by = $request->input('entered_by');
    //     $jobOrder->owner = $request->input('owner');
    //     $jobOrder->client_job_id = $request->input('client_job_id');
    //     $jobOrder->description = $request->input('description');
    //     $jobOrder->notes = $request->input('notes');
    //     $jobOrder->type = $request->input('type');
    //     $jobOrder->duration = $request->input('duration');
    //     $jobOrder->rate_max = $request->input('rate_max');
    //     $jobOrder->salary = $request->input('salary');
    //     $jobOrder->status = $request->input('status');
    //     $jobOrder->openings = $request->input('openings');
    //     $jobOrder->city = $request->input('city');
    //     $jobOrder->state = $request->input('state');
    //     $jobOrder->public = $request->input('public');
    //     $jobOrder->company_department_id = $request->input('company_department_id');
    //     $jobOrder->openings = $request->input('openings');
    //     $jobOrder->questionnaire_id = $request->input('questionnaire_id');
    //     $jobOrder->site_id = $request->input('site_id');
    //     $jobOrder->actual_rate = $request->input('actual_rate');
    //     $jobOrder->gross_margin = $request->input('gross_margin');
    //     $jobOrder->expected_rate = $request->input('expected_rate');
    //     $jobOrder->max_submission = $request->input('max_submission');
    //     $jobOrder->interview_type = $request->input('interview_type');
    //     $jobOrder->submission_deadline = $request->input('submission_deadline');
    //     $jobOrder->work_arrangement = $request->input('work_arrangement');
    //     $jobOrder->p = $request->input('p');
    //     $jobOrder->recruiter = $request->input('recruiter');
    //     $jobOrder->order = $request->input('order');
    //     $jobOrder->is_admin_hidden = $request->input('is_admin_hidden');
    //     $jobOrder->questionnaire_id	 = $request->input('questionnaire_id');
    //     $jobOrder->openings_available = $request->input('openings_available');
    //     $jobOrder->is_hot = $request->input('is_hot');
    //     $jobOrder->date_created = $request->input('date_created');
    //     $jobOrder->date_modified = $request->input('date_modified');

    //     $jobOrder->save();

    //     return redirect()->route('joborders.create');
// }


    public function create($company_id = null)
    {
        $company = Company::where('owner',Auth::user()->id)->get();
        $users = User::get();
        // dd($users);
        return view('joborders.create',compact('company_id','company','users'));
    }

       public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            // 'joborder_id' => 'required',
            'recruiter' => 'required',
            'client_job_id' => 'required',
        ]);

        $data = $request->all();
        $data['entered_by'] = Auth::user()->id;
        $data['recruiter'] = $data['recruiter'];
        $data['owner'] = $data['owner'];
        $data['is_hot'] = $data['is_hot'];
        $data['public'] = $data['is_public'];
        $data['contact_id'] = $data['contact_id'];
        $data['pay_rate'] = $data['pay_rate'];
        $data['duration'] = $data['duration'];
       $jobCreate = JobOrder::create($data);

        if ($jobCreate) {
            return response()->json(['status' => true, 'message' => 'Job Order created successfully.','data' => $jobCreate]);
        } else {
            return redirect()->back()->with('error', 'Somthing went wrong.');
        }
    }




   public function index(Request $request, $letter = null)
{  
    
    $query = Joborder::with('companies','ownerUser','recruiterUser');

        // Check if 'letter' parameter is present and apply the filter
        if ($request->has('letter')) {
            $query->where('joborders.title', 'like', $request->input('letter') . '%');
        }

        // Check if 'search' parameter is present and apply the filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('joborders.title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('companies.company_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.first_name', 'like', '%' . $searchTerm . '%');
            });
        }

        $datas = $query->get();

        // dd(  $datas);


        return view('joborders.index', compact('datas', 'letter','request'));
}

public function profiledetails($id){
    $jobDetails = JobOrder::with('attachments','companies')->where('id',$id)
      ->get();
      $candidateList = Candidate::with('ownerUser','recruiterUser')->get();
    //   dd($candidateList);
      $candidatesJobOrderDetails = CandidateJoborder::with('candidates','ownerUser','candidateJoborderStatus','recruiterUser')->where('joborder_id',$id)->get();

    $activityType = ActivityType::get();
    $calendarEvenType = calendarEvenType::get();
    $changeStatus = ChangeStatus::get();
    return view('joborders.show',compact('jobDetails','candidatesJobOrderDetails','candidateList','changeStatus','activityType','calendarEvenType'));
}

public function joborderUpdate($id){

    $jobDetails = JobOrder::where('id',$id)->get();
    $company = Company::all();
    $users = User::all();

    return view('joborders.edit',compact('jobDetails','company','users'));
}

public function joborderDelete($id){
    $jobDelete = JobOrder::find('id',$id)->delete();
    if ($jobDelete) {
        return response()->json(['status' => true, 'message' => 'Data deleted successfully.']);
    } else {
        return redirect()->back()->with('error', 'Somthing went wrong.');
    }
}


public function joborderUpdateSave(Request $request){
    // dd($request->all());
    // $request->validate([
    //     'title' => 'required',
    //     'start_date' => 'required|date',
    //     'end_date' => 'required|date',
    //     // 'joborder_id' => 'required',
    //     'recruiter' => 'required',
    //     'client_job_id' => 'required',
    //     'expected_rate' => 'required',
    //     'interview_type' => 'required',
    //     'submission_deadline' => 'required|date',
    // ]);
    $data = $request->all();
    $data['is_hot'] = $data['is_hot'];
    $data['public'] = $data['is_public'];

    $updateData = Joborder::find($request->jobOrder_id)->update($data);

    if ($updateData) {
        return response()->json(['status' => true, 'message' => 'Data updated successfully.','data' => $updateData]);
    } else {
        return redirect()->back()->with('error', 'Somthing went wrong.');
    }
}
}