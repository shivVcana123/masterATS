<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class ActivityType extends Model
{
    use HasFactory;

    protected  $fillable = ['id', 'short_description'];

    public function activities(){
        return $this->belongsTo(Activity::class,'id');
    }
}
