<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\CalendarEvenType;
use App\Models\Calender;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class CalenderController extends Controller
{
    public function index(request $request)
    {  
      $calendarEvenType = CalendarEvenType::get();
     return view('calenders.index',compact('calendarEvenType'));
    }
}
