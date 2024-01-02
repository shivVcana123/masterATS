<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedListEntry extends Model
{
    use HasFactory;
    protected $table = "saved_list_entries";
    protected $fillable = ['id', 'saved_list_id', 'data_item_type', 'data_item_id', 'site_id'];
}
