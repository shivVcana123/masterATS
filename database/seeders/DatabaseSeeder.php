<?php

namespace Database\Seeders;

use App\Models\Modual;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

        public function run()
    {
        $permissions = [
            'manage-permission','create-permission','edit-permission','delete-permission',
            'manage-role','create-role','edit-role','delete-role','show-role',
            'manage-user','create-user','edit-user','delete-user','show-user',
            'manage-module','create-module','delete-module','show-module','edit-module',
            'manage-setting',
            'manage-crud',
            'manage-langauge','create-langauge','delete-langauge','show-langauge','edit-langauge',
        ];

        $modules = [
            'user','role','module','setting','crud','langauge','permission',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }

        $role = Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'user'
        ]);

        foreach($permissions as $permission){
            $per = Permission::findByName($permission);
            $role->givePermissionTo($per);
        }

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'avatar' => ('avatar.png'),
            'type'=>'admin',
            'lang'=>'en',
            'created_by'=>'0',
        ]);

        $user->assignRole($role->id);

        foreach($modules as $module){
            Modual::create([
                'name'=>$module
            ]);
        }
    }
}

