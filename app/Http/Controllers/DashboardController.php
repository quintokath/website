<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBookings = Booking::count();

        // Get all booked dates as an array of 'Y-m-d' strings
        $bookedDates = Booking::pluck('booking_date')->map(function ($date) {
            return date('Y-m-d', strtotime($date));
        })->toArray();

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalBookings' => $totalBookings,
            'bookedDates' => $bookedDates,
        ]);
    }
}
