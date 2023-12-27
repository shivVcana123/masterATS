<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Facades\UtilityFacades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;


class UserController extends Controller
{


    public function index(UsersDataTable $table)
    {
        if (\Auth::user()->can('manage-user')) {

        return $table->render('users.index');
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }
    }


    public function create()
    {
        if (\Auth::user()->can('create-user')) {

        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $role_r = Role::findByName($request->roles);

        $user   = User::create(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'confirm_password' => 'required|same:password',
                'type' => $role_r->name,
                'created_by' => Auth::user()->id,
            ]
        );


        $user->assignRole($role_r);

        return redirect()->route('users.index')
            ->with('success', __('User created successfully'));
    }


    public function show($id)
    {
        if (\Auth::user()->can('show-user')) {

        $user = User::find($id);
        return view('users.show', compact('user'));
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }

    }


    public function edit($id)
    {
        if (\Auth::user()->can('edit-user')) {

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    } else {
        return redirect()->back()->with('error', 'Permission denied.');
    }
    }


    public function update(Request $request, $id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,

            'roles' => 'required'
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('message', __('User updated successfully'));
    }


    public function destroy($id)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        if (\Auth::user()->can('delete-user')) {


        if($id==1)
        {

            return redirect()->back()->with('error', 'Permission denied.');
        }else{

            DB::table("users")->delete($id);
            return redirect()->route('users.index')->with('success', __('User delete successfully.'));

        }
        }
    }


    public function profile()
    {
        $setting = UtilityFacades::settings();
        if (isset($setting['authentication']) && $setting['authentication'] == 'activate') {


            if (extension_loaded('imagick')) {

                $user = Auth::user();
                $google2fa_url = "";
                $secret_key = "";

                if($user->loginSecurity()->exists()){
                    $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
                    $google2fa_url = $google2fa->getQRCodeInline(
                        config('app.name'),
                        $user->email,
                        $user->loginSecurity->google2fa_secret
                    );
                    $secret_key = $user->loginSecurity->google2fa_secret;
                }

                $data = array(
                    'user' => $user,
                    'secret' => $secret_key,
                    'google2fa_url' => $google2fa_url
                );
            }
            // dd($data);
            $userDetail = Auth::user();
            // //
             //$data = '123';
            // //
            return view('users.profile', compact('data', 'userDetail'));
        } else {
            $userDetail = Auth::user();

            return view('users.profile', compact('userDetail'));
        }
    }

    public function editprofile(Request $request)
    {
        // dd($request->file('profile'));
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        $userDetail = Auth::user();
        $user       = User::findOrFail($userDetail['id']);
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users,email,' . $userDetail['id'],
                'profile' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        if ($request->hasFile('profile')) {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/avatar/');
            $image_path      = $dir . $userDetail['avatar'];

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('profile')->storeAs('uploads/avatar/', $fileNameToStore);
        }

        if (!empty($request->profile)) {
            $user['avatar'] = $fileNameToStore;
        }
        if (!is_null($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user['name']  = $request['name'];
        $user['email'] = $request['email'];
        $user->save();

        return redirect()->back()->with('success', __('Profile successfully updated.'));
    }
}
