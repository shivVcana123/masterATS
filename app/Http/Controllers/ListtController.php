<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;

use App\Models\Listt;
use App\Models\SavedList;
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
    //  $datas = DB::table('saved_lists')
    // ->join('users','saved_lists.created_by','=','users.id')
    // ->join('data_item_type','saved_lists.data_item_type','=','data_item_type.data_item_type_id')
    //   ->select('saved_lists.number_entries','saved_lists.description','saved_lists.date_created',
    //   'saved_lists.date_modified','saved_lists.is_dynamic','data_item_type.short_description',
    //   'users.first_name')
    //   ->get();

    $datas = SavedList::with('users')->get();
    // dd($datas);
     return view('listts.index', compact('datas'));
    }
}