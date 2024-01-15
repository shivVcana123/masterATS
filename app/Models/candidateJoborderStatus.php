<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidateJoborderStatus extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'short_description', 'can_be_scheduled', 'triggers_email', 'is_enabled'];
}
