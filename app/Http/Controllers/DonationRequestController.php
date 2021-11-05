<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function index()
    {
        $donationRequests = DonationRequest::paginate(20);
        return view('admin.donationRequests.index', compact('donationRequests'));
    }

    public function show($id)
    {
        $donationRequest = DonationRequest::find($id);
        return view('admin.donationRequests.show', compact('donationRequest'));
    }

    public function destroy($id)
    {
        DonationRequest::find($id)->delete();
        toast('Donation Request deleted successfully.', 'success')->width('27rem');
        return back();
    }
}
