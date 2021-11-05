<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfileFormUpdateRequest;
use App\Http\Requests\Api\ResetPasswordFormRequest;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{

    public function getProfile(Request $request)
    {
        return responseJson(1, 'success', $request->user());
    }

    public function updateProfile(ProfileFormUpdateRequest $request)
    {
        $data = $request->all();
        $id = $request->user()->id;
        $client = Client::find($id);

        if ($request->has('password')) {
            $this->validate($request, [
                'password' => 'confirmed'
            ]);
            $data = $request->except('password_confirmation');
            $data['password'] = bcrypt($data['password']);
        }

        $client->update($data);

        return responseJson(1, 'success', $client);
    }

    public function forgotPassword(Request $request)
    {
        $client = Client::where('email', $request->email)->first();

        if ($client) {
            $code = rand(1111, 9999);
            $client->update([
                'pin_code' => $code
            ]);

            Mail::to($client->email)
                ->send(new ResetPassword($code));

            return responseJson(1, 'success', ['pin_code' => $code]);
        } else {
            return responseJson(0, 'failed');
        }
    }

    public function resetPassword(ResetPasswordFormRequest $request)
    {
        $client = Client::where('email', $request->email)->first();

        if ($request->pin_code == $client->pin_code) {
            $client->update([
                'password' => bcrypt($request->password),
                'pin_code' => null
            ]);
            return responseJson(1, 'success', $client);
        } else {
            return responseJson(0, 'failed');
        }
    }
}
