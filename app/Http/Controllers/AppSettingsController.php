<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    public function index()
    {
        $appSettings = Setting::get()->first();
        return view('admin.appSettings.index', compact('appSettings'));
    }

    public function edit()
    {
        $appSettings = Setting::get()->first();
        return view('admin.appSettings.edit', compact('appSettings'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'about_app' => 'filled',
            'notification_setting_text' => 'filled',
            'phone' => 'filled',
            'email' => 'filled',
            'fb_link' => 'filled',
            'tw_link' => 'filled',
            'insta_link' => 'filled',
            'yt_link' => 'filled'
        ]);
        Setting::get()->first()->update($request->all());
        toast('App Settings Updated successfully.', 'success')->width('25rem');
        return redirect()->route('appSettings.index');
    }
}
