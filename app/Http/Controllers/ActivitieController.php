<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;

// use App\Models\Activitie;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ActivitieController extends Controller
{
    public function index(request $request)
    {  
      $datas = DB::table('activity')
      ->join('user','activity.entered_by','=','user.user_id')
      ->join('candidate','user.user_id','=','candidate.owner')
      ->join('activity_type', 'activity.type','=','activity_type.activity_type_id')
      ->join('joborder','activity.site_id','=','joborder.site_id')
      ->select('candidate.first_name','candidate.last_name','activity.notes',
      'activity.date_created','activity_type.short_description','joborder.title')
      ->get();
    //   $numbers =  $datas = DB::table('activity')
    //   ->join('user','activity.entered_by','=','user.user_id')
    //   ->join('candidate','user.user_id','=','candidate.owner')
    //   ->join('activity_type', 'activity.data_item_type','=','activity_type.activity_type_id')
    //   ->join('joborder','activity.site_id','=','joborder.site_id')
    //   ->select('user.first_name')
    //   ->get();
      return view('activities.index', compact('datas'));
    }
}
