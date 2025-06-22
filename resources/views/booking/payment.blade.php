@extends('layouts.user')
@section('content2')

<section class="px-4 mt-4">
  <div class="w-full text-white sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-center mb-6">Payment Preview</h2>

    <p><strong>House Name:</strong> {{ $house->location }}</p>
    <p><strong>Check-in Date:</strong> {{ $checkIn }}</p>
    <p><strong>Check-out Date:</strong> {{ $checkOut }}</p>
    <p><strong>Number of Nights:</strong> {{ $nights }}</p>
    <p><strong>Price per Night:</strong> {{ $house->price }} $</p>
    <p><strong>Total Price:</strong> {{ $totalPrice }} $</p>

    <form action="{{ route('bookings.confirmPayment') }}" method="POST" class="mt-6">
      @csrf
      <input type="hidden" name="house_id" value="{{ $house->id }}">
      <input type="hidden" name="check_in" value="{{ $checkIn }}">
      <input type="hidden" name="check_out" value="{{ $checkOut }}">
      
      <button type="submit" class="w-full px-5 py-2.5 bg-[#3182CE]  text-white font-medium rounded-lg">
        Confirm Booking and Payment
      </button>
    </form>

   <a href="{{ url()->previous() }}" class="flex items-center justify-center gap-2 text-sm mt-4 text-white ">
  <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF">
    <path d="M640-80 240-480l400-400 71 71-329 329 329 329-71 71Z"/>
  </svg>
  <span>Go back to edit dates</span>
</a>

  </div>
</section>

@endsection
