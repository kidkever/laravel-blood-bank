<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function cities(Request $request)
    {
        return responseJson(1, 'success', City::all());
    }

    public function governorates(Request $request)
    {
        return responseJson(1, 'success', Governorate::all());
    }

    public function bloodTypes(Request $request)
    {
        return responseJson(1, 'success', BloodType::all());
    }
}
