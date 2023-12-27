<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function setting()
    {
      return $this->hasMany(\App\Models\LoginSecurity::class, 'id');
    }
}
