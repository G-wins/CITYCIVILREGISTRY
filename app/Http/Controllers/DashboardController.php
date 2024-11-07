<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all appointments
        $appointments = Appointment::all();

        // Pass appointments to the dashboard view
        return view('dashboard', compact('appointments'));
    }
}
