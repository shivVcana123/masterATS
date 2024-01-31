<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvenType extends Model
{
    use HasFactory;
    protected $table = "calendar_event_types";
    protected $fillable = ['id', 'short_description', 'icon_image'];
}
