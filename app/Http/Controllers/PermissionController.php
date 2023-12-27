<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionsDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index(PermissionsDataTable $table)
    {

        return $table->render('permission.index');
    }

    public function create()
    {
        $roles = Role::get();

        return view('permission.create')->with('roles', $roles);
    }

    public function store(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        $this->validate(
            $request,
            [
                'name' => 'required|max:40',
            ]
        );

        $name             = $request['name'];
        $permission       = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) {
            foreach ($roles as $role) {
                $r          = Role::where('id', '=', $role)->firstOrFail();
                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('permission.index')->with(
            'message',
            'Permission ' . $permission->name . ' added!'
        );
    }


    public function edit(Permission $permission)
    {

        $roles = Role::find($permission);


        return view('permission.edit', compact('roles', 'permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        $permission = Permission::findOrFail($permission['id']);
        $this->validate(
            $request,
            [
                'name' => 'required|max:40',
            ]
        );
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permission.index')->with(
            'success',
            'Permission ' . $permission->name . ' updated!'
        );
    }

    public function destroy($id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        $permission = Permission::where('id', $id)->firstorfail()->delete();
        return redirect()->route('permission.index')->with('success', __('Permission deleted successfully.'));
    }
}
