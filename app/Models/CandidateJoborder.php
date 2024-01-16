<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateJoborder extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'candidate_id', 'joborder_id', 'site_id', 'status', 'date_submitted', 'date_created', 'date_modified', 'rating_value', 'added_by'];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function candidates(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    public function joborderDetails(){
        return $this->belongsTo(Joborder::class, 'joborder_id', 'id');
    }
    public function candidateJoborderStatus()
    {
        return $this->belongsTo(candidateJoborderStatus::class, 'status');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    // public function recruiterUser()
    // {
    //     return $this->belongsTo(User::class, 'recruiter');
    // }

    public function activities(){
        return $this->belongsTo(Activity::class,'id');
    }
}