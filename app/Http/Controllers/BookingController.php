<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Seat;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('booking.index', compact('routes'));
    }

    public function selectSeats(Request $request)
    {
        $route = Route::find($request->route_id);
        $seats = Seat::where('route_id', $route->id)->where('is_booked', false)->get();
        return view('booking.select_seat', compact('route', 'seats'));
    }

    public function confirmBooking(Request $request)
    {
        // Ensure the seat exists
        $seat = Seat::with('route')->find($request->seat_id);

        if (!$seat) {
            return redirect()->back()->withErrors(['msg' => 'Seat not found.']);
        }

        // Mark seat as booked
        $seat->is_booked = true;
        $seat->save();

        // Create booking
        Booking::create([
            'seat_id' => $seat->id,
            'customer_name' => $request->customer_name,
        ]);

        // Store booking details in session
        session([
            'route_name' => "{$seat->route->start_location} to {$seat->route->end_location}",
            'seat_number' => $seat->seat_number,
            'customer_name' => $request->customer_name,
        ]);

        return redirect()->route('booking.success');
    }


    public function success()
    {
        return view('booking.success');
    }
}

