@extends('layouts.user')

@section('content2')
 
<section class="px-4 py-8">
  <form action="{{ route('houses.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="w-full max-w-full sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black">
    @csrf

    <h2 class="mb-6 text-2xl sm:text-3xl md:text-4xl tracking-tight font-extrabold text-center text-white">
      Create House
    </h2>

    <!-- Logo Upload -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your logo</label>
      <input type="file" name="img[]" multiple required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Location -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your location</label>
      <input type="text" name="location" required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Description -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your description</label>
      <input type="text" name="dec_" required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Price -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your price</label>
      <input type="number" name="price" required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Room Number -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Room number</label>
      <input type="number" name="numofR" required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- City -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">The City</label>
      <input type="text" name="City" required
             class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Category Select -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Category name</label>
      <select id="category_id" name="category_id"
              class="border border-[#718096] bg-[#4A5568] text-white text-base sm:text-sm rounded-lg block w-full p-2.5 focus:ring-[#63B3ED] focus:border-[#63B3ED]">
        <option selected disabled>Choose a Category</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Hidden User ID -->
    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

    <!-- Submit Button -->
    <button type="submit"
            class="w-full sm:w-auto px-5 py-2.5 bg-[#3182CE] hover:bg-[#2B6CB0] text-white text-sm font-medium rounded-lg text-center transition">
      Submit
    </button>
  </form>
</section>



@endsection