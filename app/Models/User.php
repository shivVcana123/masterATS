<?php

namespace App\Models;

use App\Facades\UtilityFacades;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Company;
use App\Models\SavedList;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'name'=>'string'
    ];

    public function creatorId()
    {

        if($this->type == 'company' || $this->type == 'admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }

    public function currentLanguage()
    {
        return $this->lang;
    }

    public function loginSecurity()
    {
        return $this->hasOne('App\Models\LoginSecurity');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function SavedList()
    {
        return $this->belongsTo(SavedList::class);
    }

}
