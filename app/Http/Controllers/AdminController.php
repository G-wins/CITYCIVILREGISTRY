<?php

namespace App\Http\Controllers;

use App\Models\Client;

class AdminController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.dashboard', compact('clients'));
    }
}
