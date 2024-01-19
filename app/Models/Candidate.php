<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Joborder;
use App\Models\CandidateJoborder;

class Candidate extends Model
{
    use HasFactory;
     protected $fillable = [
        'id', 'site_id', 'first_name','middle_name',
        'last_name', 'phone_home', 'phone_cell', 'phone_work',
        'address', 'city', 'state','zip','source', 'date_available',
        'can_relocate','notes','key_skills', 'current_employer','entered_by',
        'owner','date_created','date_modified','email1','email2','web_site',
        'import_id','is_hot','eeo_ethnic_type_id','eeo_veteran_type_id',
        'eeo_disability_status','eeo_gender','desired_pay','current_pay',
        'is_active','is_admin_hidden','best_time_to_cal'
    ];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

  
    public function jobDetails()
    {
        return $this->hasMany(Joborder::class);
    }
    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'owner');
    }
    public function recruiterUser()
    {
        return $this->belongsTo(User::class,'entered_by','id');
    }

    public function candidateJoborder(){
        return $this->hasMany(CandidateJobOrder::class, 'candidate_id', 'id');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}