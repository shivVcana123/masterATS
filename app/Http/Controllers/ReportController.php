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
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ReportController extends Controller
{
    public function index(request $request)
    {  
        $jobOrderCount = Joborder::get()->count();
        $candidateCount = Candidate::get()->count();
        $companyCount = Company::get()->count();
        $contactCount = Contact::get()->count();
    
     return view('reports.index',compact('jobOrderCount','candidateCount','companyCount','contactCount'));
    }
}