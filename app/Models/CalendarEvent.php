<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CalendarEvenType;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'type', 'date', 'title', 'all_day', 'data_item_id', 'data_item_type', 'entered_by', 'date_created', 'date_modified', 'site_id', 'joborder_id', 'description', 'duration', 'reminder_enabled', 'reminder_email', 'reminder_time', 'public'];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function calendarEventType(){
        return $this->hasMany(CalendarEvenType::class,'id');
    }
    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'entered_by');
    }
}