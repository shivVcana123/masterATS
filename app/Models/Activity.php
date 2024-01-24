<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CandidateJoborder;
use App\Models\ActivityType;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'data_item_id', 'data_item_type', 'joborder_id', 'site_id', 'entered_by', 'date_created', 'type', 'notes', 'date_modified'];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function candidateJoborder(){
        return $this->hasMany(CandidateJoborder::class,'joborder_id','id');
    }

    public function candidateJoborderStatus(){
        return $this->hasMany(candidateJoborderStatus::class,'id','data_item_type');
    }

    public function activityType(){
        return $this->hasMany(ActivityType::class,'id','type');
    }
}