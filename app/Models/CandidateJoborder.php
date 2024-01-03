<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateJoborder extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'candidate_id', 'joborder_id', 'site_id', 'status', 'date_submitted', 'date_created', 'date_modified', 'rating_value', 'added_by'];

    public function candidatesDetails(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    public function joborderDetails(){
        return $this->belongsTo(Joborder::class, 'joborder_id', 'id');
    }
    public function users(){
        return $this->belongsTo(User::class,'id');
    }

    public function activities(){
        return $this->belongsTo(Activity::class,'id');
    }
}
