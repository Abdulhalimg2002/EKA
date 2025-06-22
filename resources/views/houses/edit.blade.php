@extends('layouts.user')

@section('content2')
<section class="px-4 mt-4">
  <form action="{{ route('houses.update', $house->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="w-full sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black">
    @csrf
    @method('PUT')

    <h2 class="mb-6 text-2xl sm:text-3xl md:text-4xl tracking-tight font-extrabold text-center text-white">
      Edit House
    </h2>

    <!-- Show existing images -->
   @if ($house->img && is_array($house->img))
  <div class="mb-5">
    <label class="block mb-2 font-medium text-white"><b>Current Images</b></label>
    <div class="flex flex-wrap gap-2">
      @foreach($house->img as $image)
        <div class="relative">
          <img src="{{ asset('storage/' . $image) }}" class="h-20 w-20 object-cover rounded" alt="House Image">
          {{-- اختيار الصور المراد حذفها --}}
          <input type="checkbox" name="remove_images[]" value="{{ $image }}"
                 class="absolute top-1 right-1 w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500">
        </div>
      @endforeach
    </div>
  </div>
@endif

<!-- رفع صور جديدة -->
<div class="mb-5">
  <label class="block mb-2 font-medium text-white"><b>Update Images</b></label>
  <input type="file" name="img[]" multiple
         class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
</div>

    <!-- Location -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your location</label>
      <input type="text" name="location" value="{{ old('location', $house->location) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Description -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your description</label>
      <input type="text" name="dec_" value="{{ old('dec_', $house->dec_) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Price -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Your price</label>
      <input type="number" name="price" value="{{ old('price', $house->price) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Room number -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Room number</label>
      <input type="number" name="numofR" value="{{ old('numofR', $house->numofR) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- City -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">The City</label>
      <input type="text" name="City" value="{{ old('City', $house->City) }}" required
             class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
    </div>

    <!-- Category -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">Category name</label>
      <select id="category_id" name="category_id"
              class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]">
        <option disabled>Choose a Category</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $house->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- User ID -->
    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

    <!-- Submit button -->
    <button type="submit"
            class="w-full sm:w-auto px-5 py-2.5 bg-green-700 text-white text-sm font-medium rounded-lg text-center">
      Update
    </button>
  </form>
</section>


@endsection