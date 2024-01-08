<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'company_id', 'site_id', 'last_name', 'first_name', 'title', 'email1', 'email2', 'phone_work', 'phone_cell', 'phone_other', 'address', 'city', 'state', 'zip', 'is_hot', 'notes', 'entered_by', 'owner', 'date_created', 'date_modified', 'left_company', 'import_id', 'company_department_id', 'reports_to'];

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function companies()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'owner');
    }
}