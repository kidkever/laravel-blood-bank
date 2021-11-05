<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterFormRequest;
use App\Http\Requests\Api\LoginFormRequest;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register a new user
    public function register(RegisterFormRequest $request)
    {
        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($data['password']);

        $client = Client::create($data);
        //$client->city->governorate_id

        $governorate_id = City::where('id', $data['city_id'])->pluck('governorate_id');
        $bloodType_id = $data['blood_type_id'];

        $client->governorates()->attach($governorate_id);
        $client->bloodTypes()->attach($bloodType_id);

        $token = $client->createToken(env('AUTH_TOKEN'))->plainTextToken;

        $response = [
            'client' => $client,
            'token' => $token
        ];

        return responseJson(1, 'success', $response);
    }

    // login a user
    public function login(LoginFormRequest $request)
    {
        $data = $request->all();

        $client = Client::where('mobile_num', $data['mobile_num'])->first();

        if (!$client || !Hash::check($data['password'], $client->password)) {
            return responseJson(0, 'البيانات غير صحيحة');
        }

        $token = $client->createToken(env('AUTH_TOKEN'))->plainTextToken;

        $response = [
            'client' => $client,
            'token' => $token
        ];

        return responseJson(1, 'success', $response);
    }

    // logout a user
    public function logout(Request $request)
    {
        auth()->guard('api')->user()->tokens()->delete();
        return responseJson(1, 'logged out successfully');
    }
}
