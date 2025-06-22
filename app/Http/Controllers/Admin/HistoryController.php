<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use App\Models\House;
use App\Models\Category;
use App\Models\Booking;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $bookings = Booking::all();
    $houses = House::all();
    $categories = Category::all();
    $users = User::all();
    $history = history::with(['user', 'category', 'house', 'booking'])->get();
    return view('admin.history.index', compact('history', 'houses', 'categories', 'users', 'bookings'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|string|in:approved,rejected',
        ]);

        $booking = Booking::findOrFail($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        // Create history record
        $history = new History();
        $history->booking_id = $booking->id;
        $history->user_id = $booking->users_id;
        $history->house_id = $booking->house_id;
        $history->status = $request->status;
        $history->save();

        // Optionally, you can notify the user about the booking status change
        if ($request->status === 'approved') {
            $booking->user->notify(new \App\Notifications\BookingApproved($booking));
        }
        return redirect()->route('history.index')->with('success', 'Booking status updated and history recorded successfully.');



    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $history = history::findOrFail($id);
        return view('history.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
