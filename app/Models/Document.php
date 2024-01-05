<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Joborder;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'document_file', 'joborder_id', 'company_id', 'candidate_id', 'owner_id'];

}
