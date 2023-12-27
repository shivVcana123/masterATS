<?php

namespace App\Http\Controllers;

use App\Facades\UtilityFacades;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use File;


class SettingController extends Controller
{
    public function index()
    {

        return view('settings.setting');
    }

    public function getmail()
    {
        $timezones = config('timezones');
        return view('settings.emailset', compact('timezones'));
    }

    public function saveEmailSettings(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        $arrEnv = [
            'MAIL_DRIVER' => $request->mail_driver,
            'MAIL_HOST' => $request->mail_host,
            'MAIL_PORT' => $request->mail_port,
            'MAIL_USERNAME' => $request->mail_username,
            'MAIL_PASSWORD' => $request->mail_password,
            'MAIL_ENCRYPTION' => $request->mail_encryption,
            'MAIL_FROM_NAME' => $request->mail_from_name,
            'MAIL_FROM_ADDRESS' => $request->mail_from_address,
        ];
        UtilityFacades::setEnvironmentValue($arrEnv);

        return redirect()->back()->with('success', __('Setting successfully updated.'));
    }
    public function getdate()
    {
        $settings = UtilityFacades::settings();
        $timezones = config('timezones');
        return view('settings.datetime', compact('settings', 'timezones'));
    }

    public function saveSystemSettings(Request $request)
    {
        // dd($request->all());
        $settings = UtilityFacades::settings();
        $arrEnv = [
            'TIMEZONE' => $request->timezone,
            'SITE_RTL' => !isset($request->SITE_RTL) ? 'off' : 'on',
        ];

        UtilityFacades::setEnvironmentValue($arrEnv);
        $post=[
            'authentication'=>isset($request->authentication)? 'activate':'deactivate',
            'timezone'=>isset($request->timezone)? $request->timezone:'',
            'site_date_format'=>isset($request->site_date_format)? $request->site_date_format:'',
            'default_language'=>isset($request->default_language)? $request->default_language:'',
            'dark_mode'=>isset($request->dark_mode)? $request->dark_mode: '',
            'color'=>isset($request->color)? $request->color: '',
        ];

        foreach ($post as $key => $data) {
            DB::insert(
                'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $data,
                    $key,
                    Auth::user()->creatorId(),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                ]
            );
        }
        return redirect()->back()->with('success', __('Setting successfully updated.'));
    }

    public function getlogo()
    {
        $settings = UtilityFacades::settings();
        return view('settings.logo', compact('settings'));
    }

    public function store(Request $request)
    {

        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));
        if ($request->dark_logo) {
            $request->validate(
                [
                    'dark_logo' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
                ]
            );
            $logoName = 'dark_logo.png';
            $request->file('dark_logo')->storeAs('uploads/logo/', $logoName);
        }
        if ($request->light_logo) {
            $request->validate(
                [
                    'light_logo' => 'image|mimes:png',
                ]
            );

            $logoName = 'light_logo.png';
            $request->file('light_logo')->storeAs('uploads/logo/', $logoName);
        }
        if ($request->favicon) {
            $request->validate(
                [
                    'favicon' => 'image|mimes:png',
                ]
            );
            $favicon = 'favicon.png';
            $request->file('favicon')->storeAs('uploads/logo/', $favicon);
        }


        UtilityFacades::setEnvironmentValue(['APP_NAME' => $request->app_name,]);
        $post = $request->all();
        unset($post['_token']);
        // dd($post);
        foreach ($post as $key => $data) {
            DB::insert(
                'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $data,
                    $key,
                    Auth::user()->creatorId(),
                ]
            );
        }
        return redirect()->back()->with('success', __('Setting successfully updated.'));
    }

    public function testMail()
    {
        return view('settings.test_mail');
    }

    public function testSendMail(Request $request)
    {
        // return redirect()->back()->with('warning', __('This Action Is Not Allowed Because Of Demo Mode.'));

        $validator = \Validator::make($request->all(), ['email' => 'required|email']);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        try {
            Mail::to($request->email)->send(new TestMail());
        } catch (\Exception $e) {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            return redirect()->back()->with('error', $smtp_error);
        }
        return redirect()->back()->with('success', __('Email send Successfully.'));
    }
}
