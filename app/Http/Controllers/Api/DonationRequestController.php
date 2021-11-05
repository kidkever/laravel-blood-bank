<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequestFormRequest;
use App\Models\Client;
use App\Models\Clientables;
use App\Models\DonationRequest;
use App\Models\FcmToken;
use App\Models\Governorate;
use App\Models\Notification;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function getAllDonationRequests(Request $request)
    {
        $data = $request->all();

        $allDonationRequests = [];
        $filteredByBloodType = [];
        $filteredByGovernorate = [];

        if ($data) {

            if ($request->has('bloodTypeId')) {
                $this->validate($request, [
                    'bloodTypeId' => 'filled'
                ]);

                $filteredByBloodType = DonationRequest::where('blood_type_id', $data['bloodTypeId'])->get()->toArray();
            }

            if ($request->has('governorateId')) {
                $this->validate($request, [
                    'governorateId' => 'filled'
                ]);

                $filteredByGovernorate = Governorate::find($request->governorateId)->cities()->donationRequests()->get()->toArray();
            }
        } else {
            $allDonationRequests = DonationRequest::all()->toArray();
        }

        $donationRequest = array_merge($filteredByBloodType, $filteredByGovernorate, $allDonationRequests);

        return responseJson(1, 'success', $donationRequest);
    }

    public function getSingleDonationRequest(Request $request, $id)
    {
        return responseJson(1, 'success', DonationRequest::find($id));
    }

    public function createDonationRequest(DonationRequestFormRequest $request)
    {
        $data = $request->all();
        $data['client_id'] = $request->user()->id;
        $donationRequest = DonationRequest::create($data);

        // $clients = Client::whereHas('governorates', function ($governorate) use ($donationRequest) {
        //     $governorate->where('clients.id', $donationRequest->city->governorate_id);
        // })->whereHas('bloodTypes', function ($bloodType) use ($donationRequest) {
        //     $bloodType->where('clients.id', $donationRequest->blood_type_id);
        // })->get();

        $client_fcm_tokens = FcmToken::whereHas('client', function ($client) use ($donationRequest) {
            $client->whereHas('governorates', function ($governorate) use ($donationRequest) {
                $governorate->where('clients.id', $donationRequest->city->governorate_id);
            })->whereHas('bloodTypes', function ($bloodType) use ($donationRequest) {
                $bloodType->where('clients.id', $donationRequest->blood_type_id);
            });
        })->pluck('id')->toArray();
        // $request->user()->notifications::create
        // $notification = Notification::create([
        //     "title" => "يوجد حالة قريبة منك",
        //     "content" => "يوجد حالة قريبة منك فى حاجة الى تبرع باكياس دم",
        //     "donation_request_id" => $donationRequest->id
        // ]);

        $notification = sendNotification($client_fcm_tokens, [
            "title" => "يوجد حالة قريبة منك",
            "body" => "يوجد حالة قريبة منك فى حاجة الى تبرع باكياس دم"
        ]);

        return responseJson(1, 'success', [
            'notification' => $notification,
            'created donation request' => $donationRequest
        ]);
    }
}
