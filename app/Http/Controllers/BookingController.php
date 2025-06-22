<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\House;
use App\Models\History;
use App\Notifications\BookingCreated;
use App\Notifications\BookingApproved;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'house')->get();
        return view('Profile.index', compact('bookings'));
    }

    public function create($houseId)
    {
        $house = House::findOrFail($houseId);
        $users = User::all();
        return view('booking.create', compact('house', 'users'));
    }

    public function paymentPreview(Request $request, $houseId)
    {
        $request->validate([
            'check_in' => 'required|date|after_or_equal:now',
            'check_out' => 'required|date|after:check_in',
        ]);

        $house = House::findOrFail($houseId);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkOut->diffInDays($checkIn);
        $totalPrice = $nights * $house->price;

        return view('booking.payment', compact('house', 'checkIn', 'checkOut', 'nights', 'totalPrice'));
    }

    public function confirmPayment(Request $request)
    {
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'check_in' => 'required|date|after_or_equal:now',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = Booking::create([
            'house_id' => $request->house_id,
            'users_id' => auth()->id(),
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'pending', // ✅ في انتظار الموافقة
        ]);

        $house = House::findOrFail($request->house_id);
        $owner = $house->user;
        $booking->load('user');
        $owner->notify(new BookingCreated($booking));

        return redirect()->route('home')->with('success', 'Payment completed. Waiting for host approval.');
    }

   public function approveFromNotification($bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $house = $booking->house;

    if (auth()->id() !== $house->users_id) {
        abort(403, 'You are not authorized to approve this booking.');
    }

    $booking->status = 'approved';
    $booking->save();

    // إضافة السجل في History
    History::create([
        'category_id' => $house->category_id,
        'house_id' => $house->id,
        'users_id' => $booking->users_id,
        'bookings_id' => $booking->id,
    ]);

    // إرسال إشعار للمستخدم صاحب الحجز بأن تم الموافقة
    $booking->user->notify(new \App\Notifications\BookingApproved($booking));

    return redirect()->route('home')->with('success', 'Booking approved successfully.');
}


    public function show(string $id)
    {
        $booking = Booking::with('user', 'house')->findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('Profile')->with('success', 'Booking updated successfully.');
    }

    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('Profile')->with('success', 'Booking deleted successfully.');
    }
}

