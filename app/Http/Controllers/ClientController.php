<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
        toast('Client deleted successfully.', 'success');
        return back();
    }
}
