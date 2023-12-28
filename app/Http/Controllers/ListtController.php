<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;

use App\Models\Listt;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ListtController extends Controller
{
    public function index(request $request)
    {  
     $datas = DB::table('saved_list')
    ->join('users','saved_list.created_by','=','users.id')
    ->join('data_item_type','saved_list.data_item_type','=','data_item_type.data_item_type_id')
      ->select('saved_list.number_entries','saved_list.description','saved_list.date_created',
      'saved_list.date_modified','saved_list.is_dynamic','data_item_type.short_description',
      'users.first_name')
      ->get();
     return view('listts.index', compact('datas'));
    }
}