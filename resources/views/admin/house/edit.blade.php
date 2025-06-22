@extends('layouts.dashboard')

@section('content1')
<section class="px-4 sm:px-0 mt-4">
  <form class="max-w-sm mx-auto border border-[#718096] rounded-xl p-6 sm:p-10 bg-[#4A5568] shadow-xl shadow-black" 
        action="{{ route('house.update', $houses->id) }}" method="POST">
      @csrf
      @method('PUT')

      <h2 class="mb-4 text-3xl sm:text-4xl tracking-tight font-extrabold text-center text-white">Edit House</h2>

      <div class="mb-5">
          <label class="block mb-2 font-medium text-white">Status</label>
          <select name="status"
              class=" border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]">
              <option value="pending" {{ $houses->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $houses->status == 'approved' ? 'selected' : '' }}>Approved</option>
          </select>
      </div>

      <button type="submit"
          class="w-full text-white bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center sm:w-auto">
          Update
      </button>
  </form>
</section>

@endsection

