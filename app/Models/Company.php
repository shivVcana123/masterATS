<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Joborder;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = ['id', 'site_id', 'billing_contact', 'company_name', 'email', 'address', 'city', 'state', 'zip', 'primary_phone', 'secondary_phone', 'web_url', 'key_technologies', 'notes', 'entered_by', 'owner', 'is_hot', 'fax_number', 'import_id', 'default_company', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->hasMany(User::class,'id','owner');
    }

    public function jobDetails()
    {
        return $this->hasMany(Joborder::class,'company_id', 'id');
    }
  
}
