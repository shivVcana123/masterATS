<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\Joborder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Http\Models\User;


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


    public function create()
    {
        return view('joborders.create');
    }

       public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            // 'joborder_id' => 'required',
            'recruiter' => 'required',
            'client_job_id' => 'required',
            'expected_rate' => 'required',
            'interview_type' => 'required',
            'submission_deadline' => 'required|date',
        ]);

        JobOrder::create($request->all());

        return redirect()->route('joborders.create')->with('success', 'Job Order created successfully!');
    }




   public function index(Request $request, $letter = null)
{  
    $query = DB::table('joborders')
    ->join('companies', 'joborders.id', '=', 'companies.id')
    ->join('users', 'joborders.owner', '=', 'users.id')
    ->leftJoin('users as recruiter', 'joborders.recruiter', '=', 'recruiter.id')
    ->select('joborders.id', 'joborders.title', 'joborders.status', 'joborders.date_created',
        'joborders.owner', 'joborders.type', 'companies.company_name', 'users.first_name as owner_name',
        'joborders.client_job_id', 'joborders.date_modified', 'recruiter.id as recruiter_id',
        'recruiter.first_name as recruiter_name')
    ->orderBy('joborders.recruiter', 'ASC');

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


        return view('joborders.index', compact('datas', 'letter','request'));
}

public function profile($id){
    $jobDetails = JobOrder::where('id',$id)->get();
    // dd($jobDetails);
    return view('joborders.show',compact('jobDetails'));
}
}
