<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SavedList extends Model
{
    use HasFactory;

    protected $table = "saved_lists";
    protected $fillable = ['id', 'description', 'data_item_type', 'site_id', 'is_dynamic', 'datagrid_instance', 'parameters', 'created_by', 'number_entries', 'date_created', 'date_modified'];

    
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public function users()
    {
        return $this->hasMany(User::class, 'id'); // Assuming 'data_id' is the foreign key in the users table
    }
}