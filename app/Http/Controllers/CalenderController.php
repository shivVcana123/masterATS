<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FacilitiesDataTable;
use App\Facades\UtilityFacades;
use App\Models\CalendarEvent;
use App\Models\CalendarEvenType;
use App\Models\Calender;
use DateTime;
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
   
     return view('calenders.index',compact('calendarEvenType','scheduleEventDetails'));
    }

    public function getScheduleEvents($eventId = null)
    {  
      if($eventId){
        $scheduleEventDetails = CalendarEvent::with('calendarEventType','ownerUser')
        ->where('id',$eventId)
        ->get();
      }else{

        $scheduleEventDetails = CalendarEvent::with('calendarEventType','ownerUser')->get();
      }
      // dd($scheduleEventDetails);
      if($scheduleEventDetails){

        return response()->json(['status' => true, 'message' => 'Event scheduled successfully.','data' => $scheduleEventDetails]);
       }else{
        
        return response()->json(['status' => false, 'message' => 'Something went wrong.']);
       }
    }

    public function deleteScheduleEvents($eventId){
      $deleteScheduleEvents = CalendarEvent::find($eventId)->delete();

      if($deleteScheduleEvents){
        return response()->json(['status' => true, 'message' => 'Event deleted successfully.']);
      }else{
        return response()->json(['status' => false, 'message' => 'Something went wrong.']);
      }
    }

    public function scheduleEvent(Request $request){
      // dd($request->all());
      $scheduleEvent = new CalendarEvent();
  
      if($request->editEventID != null){
          $scheduleEvent = CalendarEvent::find($request->editEventID);
          $operation = ($scheduleEvent->exists) ? 'updated' : 'not found';
      } else {
          $operation = 'added';
      }

      if($request->allDays == '1'){
        $date = $request->year.'-'.$request->monthDropdown.'-'.$request->dateDropdown.' '.$request->hours.':'.$request->minutes.':00 '.$request->day_am_pm;
        $date_data = DateTime::createFromFormat('y-n-j g:i:s A', $date);
        $dateTime = $date_data->format('Y-m-d');
      } else {
        $date = $request->year.'-'.$request->monthDropdown.'-'.$request->dateDropdown.' '.$request->hours.':'.$request->minutes.':00 '.$request->day_am_pm;
        $dateTime = DateTime::createFromFormat('y-n-j g:i:s A', $date);
      }
  
      $scheduleEvent->title = $request->title;
      $scheduleEvent->entered_by = Auth::user()->id;
      $scheduleEvent->calendar_event_type_id = $request->eventType;
      $scheduleEvent->public = $request->publicEntry;
      $scheduleEvent->date = $dateTime;
      $scheduleEvent->duration = $request->length_hours;
      $scheduleEvent->description = $request->description;
  
      $operation = ($scheduleEvent->save()) ? $operation : 'failed';
  
      return response()->json([
          'status' => $scheduleEvent->exists,
          'message' => "Event schedule $operation successfully.",
          'data' => $scheduleEvent
      ]);
  }
}