<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Joborder;
use App\Models\Report;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Week;

class ReportController extends Controller
{
    public function index(request $request)
    {  

    //     $submissionsCountData = Joborder::with('candidateJoborder','candidateJoborder.candidates','candidateJoborder.ownerUser')->get();
       
    //    dd($submissionsCountData);
        $periods = [
            'Today' => Carbon::today(),
            'Yesterday' => Carbon::yesterday(),
            'This Week' => [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()],
            'Last Week' => [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()],
            'This Month' => [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()],
            'Last Month' =>[Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()],
            'This Year' =>  [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()],
            'Last Year' => [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()],
            'To Date' => Carbon::today(),
        ];

        $jobOrderCount = [];
        $candidateCount = [];
        $companyCount = [];
        $contactCount = [];
        $submissionsCount = [];
        $submissionsCountData = [];
           
        foreach($periods as $label => $period){
            if(is_array($period)){
                $jobOrderCount[$label] = Joborder::whereBetween('created_at', $period)->count();
                $submissionsCount[$label] = Joborder::whereBetween('submission_deadline', $period)->count();
                // $submissionsCountData[$label] = Joborder::with('candidateJoborder')->whereBetween('submission_deadline', $period)->get();
                $submissionsCountData[$label] = Joborder::with('companies','ownerUser','recruiterUser','candidateJoborder.candidates')->whereBetween('submission_deadline', $period)->get();
                $candidateCount[$label] = Candidate::whereBetween('date_created', $period)->count();
                $companyCount[$label] = Company::whereBetween('created_at', $period)->count();
                $contactCount[$label] = Contact::whereBetween('date_created', $period)->count();
            }else{
                $jobOrderCount[$label] = Joborder::whereDate('created_at', $period)->count();
                $submissionsCount[$label] = Joborder::whereDate('submission_deadline', $period)->count();
                // $submissionsCountData[$label] = Joborder::with('candidateJoborder')->whereDate('submission_deadline', $period)->get();
                $submissionsCountData[$label] = Joborder::with('companies','ownerUser','recruiterUser','candidateJoborder.candidates')->whereDate('submission_deadline', $period)->get();
                $candidateCount[$label] = Candidate::whereDate('date_created', $period)->count();
                $companyCount[$label] = Company::whereDate('created_at', $period)->count();
                $contactCount[$label] = Contact::whereDate('date_created', $period)->count();
            }
        }
        // dd($submissionsCountData);
    
     return view('reports.index',with(['jobOrderCount' => $jobOrderCount,'candidateCount' => $candidateCount,'companyCount' => $companyCount,'contactCount' => $contactCount,'submissionsCount' => $submissionsCount,'submissionsCountData' => $submissionsCountData]));
    }

    
}