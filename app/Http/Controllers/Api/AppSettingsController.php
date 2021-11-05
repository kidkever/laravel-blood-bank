<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUsFormRequest;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    public function appSettings(Request $request)
    {
        return responseJson(1, 'success', Setting::all());
    }

    public function contactUsMsg(ContactUsFormRequest $request)
    {
        $data = $request->all();
        $data['client_id'] = $request->user()->id;
        $msg = ContactUs::create($data);
        return responseJson(1, 'success', $msg);
    }
}
