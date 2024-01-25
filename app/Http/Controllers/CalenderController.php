<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\CalendarEvent;
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
      $scheduleEventDetails = CalendarEvent::with('calendarEventType','ownerUser')->get();
      // dd($scheduleEventDetails);
     return view('calenders.index',compact('calendarEvenType','scheduleEventDetails'));
    }

    public function getScheduleEvents()
    {  
      $scheduleEventDetails = CalendarEvent::with('calendarEventType','ownerUser')->get();

      if($scheduleEventDetails){

        return response()->json(['status' => true, 'message' => 'Event scheduled successfully.','data' => $scheduleEventDetails]);
       }else{
        
        return response()->json(['status' => false, 'message' => 'Something went wrong.']);
       }
    }

    public function scheduleEvent(Request $request){

      $scheduleEvent = new CalendarEvent();
       $scheduleEvent->title =  $request->title;
       $scheduleEvent->entered_by = Auth::user()->id;
       $scheduleEvent->type =  $request->eventType;
       $scheduleEvent->public =  $request->publicEntry;
       $date = $request->year.'-'.$request->monthDropdown.'-'.$request->dateDropdown.' '.$request->hours.':'.$request->minutes.' '.$request->day_am_pm;
       $scheduleEvent->date =  $date;
       $scheduleEvent->duration =  $request->length_hours;
       $scheduleEvent->description =  $request->description;
       $scheduleEvent->save();
       if($scheduleEvent){
        return response()->json(['status' => true, 'message' => 'Event scheduled successfully.','data' => $scheduleEvent]);
       }else{
        return response()->json(['status' => false, 'message' => 'Something went wrong.']);
       }
    }
}