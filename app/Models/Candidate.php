<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
     protected $fillable = [
        'candidate_id', 'site_id', 'first_name','middle_name',
        'last_name', 'phone_home', 'phone_cell', 'phone_work',
        'address', 'city', 'state','zip','source', 'date_available',
        'can_relocate','notes','key_skills', 'current_employer','entered_by',
        'owner','date_created','date_modified','email1','email2','web_site',
        'import_id','is_hot','eeo_ethnic_type_id','eeo_veteran_type_id',
        'eeo_disability_status','eeo_gender','desired_pay','current_pay',
        'is_active','is_admin_hidden','best_time_to_cal'
    ];
}
