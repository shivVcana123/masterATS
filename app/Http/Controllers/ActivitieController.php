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
      ->join('users','activity.entered_by','=','users.id')
      ->join('candidates','users.id','=','candidates.owner')
      ->join('activity_type', 'activity.type','=','activity_type.id')
      ->join('joborders','activity.id','=','joborders.id')
      ->select('candidates.first_name','candidates.last_name','activity.notes',
      'activity.date_created','activity_type.short_description','joborders.title')
      ->get();
    //   $numbers =  $datas = DB::table('activity')
    //   ->join('users','activity.entered_by','=','users.id')
    //   ->join('candidates','users.id','=','candidates.owner')
    //   ->join('activity_type', 'activity.data_item_type','=','activity_type.activity_type_id')
    //   ->join('joborders','activity.site_id','=','joborders.site_id')
    //   ->select('users.first_name')
    //   ->get();
      return view('activities.index', compact('datas'));
    }
}
