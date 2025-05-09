<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Models\User;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
        ]);

        $booking = Booking::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
            'service_id' => $validated['service_id'],
        ]);

        return response()->json([
            'message' => 'Booking successful',
            'booking' => $booking,
        ], 201);
    }

    public function status($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        return response()->json([
            'booking_id' => $booking->id,
            'status' => $booking->status,
        ]);
    }
}
