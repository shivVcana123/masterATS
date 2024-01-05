<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joborder extends Model
{
    use HasFactory;
          protected $fillable = [
        'title', 'start_date', 'end_date', 'age', 'perposal', 'company_id', 'recruiter', 'contact_id', 'entered_by', 'owner',
        'client_job_id', 'description', 'notes', 'type', 'duration', 'rate_max', 'salary', 'status', 'openings', 'city', 'state',
        'public', 'company_department_id', 'questionnaire_id', 'site_id', 'actual_rate', 'gross_margin', 'expected_rate', 'max_submission',
        'interview_type', 'submission_deadline', 'work_arrangement', 'p', 'order', 'is_admin_hidden', 'questionnaire_id', 'openings_available',
        'is_hot', 'date_created', 'date_modified','_token', // Add '_token' here

    ];

    public function candidateJoborder(){
        return $this->hasMany(CandidateJobOrder::class, 'joborder_id', 'id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function recruiterUser()
    {
        return $this->belongsTo(User::class, 'recruiter');
    }

    public function documents()
    {
        return $this->hasMany(Document::class,'joborder_id','id');
    }

}
