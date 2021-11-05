<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        ContactUs::find($id)->delete();
        toast('Contact Message deleted successfully.', 'success')->width('26rem');
        return back();
    }
}
