@extends('layouts.user')

@section('content2')
<section class="px-4 mt-4">
  <form action="{{ route('bookings.update',$booking->id) }}"
        method="POST"
        class="w-full sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black">
    @csrf
    @method('PUT')

    <h2 class="mb-6 text-2xl sm:text-3xl md:text-4xl tracking-tight font-extrabold text-center text-white">
      Edit Booking
    </h2>

    @if ($errors->any())
      <div class="mb-4 text-red-400">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Start Date -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Start Date</label>
      <input type="date" name="check_in" value="{{ old('check_in', \Carbon\Carbon::parse($booking->check_in)->format('Y-m-d')) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- End Date -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">End Date</label>
      <input type="date" name="check_out"  value="{{ old('check_out', \Carbon\Carbon::parse($booking->check_out)->format('Y-m-d')) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>


    <button type="submit"
            class="w-full bg-grren-700 sm:w-auto px-5 py-2.5 bg-blue-700 text-white text-sm font-medium rounded-lg text-center">
      Update Booking
    </button>
  </form>
</section>

@endsection