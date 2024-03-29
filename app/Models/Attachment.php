<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [ 'id', 'attachable_id', 'attachable_type', 'owner_id', 'data_item_id', 'data_item_type', 'site_id', 'title', 'original_filename', 'stored_filename', 'content_type', 'resume_content', 'text', 'date_created', 'date_modified', 'profile_image', 'directory_name', 'md5_sum', 'file_size_kb', 'md5_sum_text'];


    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function attachable()
    {
        return $this->morphTo();
    }
}
