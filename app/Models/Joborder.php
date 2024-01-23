<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joborder extends Model
{
    use HasFactory;
          protected $fillable = [
            'id', 'recruiter', 'contact_id', 'company_id', 'entered_by', 'owner', 'site_id', 'client_job_id', 'title', 'description', 'expected_candidate', 'enter_bill_rate', 'pay_rate', 'notes', 'type', 'duration', 'rate_max', 'salary', 'status', 'is_hot', 'openings', 'city', 'state', 'start_date', 'end_date', 'date_created', 'date_modified', 'public', 'company_department_id', 'is_admin_hidden', 'openings_available', 'questionnaire_id', 'import_id', 'actualrate', 'actual_rate', 'gross_margin', 'expected_rate', 'max_submission', 'interview_type', 'submission_deadline', 'work_arrangement', 'p', '_token', 'updated_at', 'created_at',

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

   public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function documents()
    {
        return $this->hasMany(Attachment::class,'company_id','id');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class,'company_id','id');
    }

}
