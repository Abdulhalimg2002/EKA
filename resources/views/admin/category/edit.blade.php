@extends('layouts.dashboard')

@section('content1')

<section class="py-10 px-4">
  <form
    class="w-full max-w-full sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black"
    action="{{ route('category.update', $category->id) }}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @method('PUT')

    <h2 class="mb-6 text-3xl sm:text-4xl tracking-tight font-extrabold text-center text-white">
      Edit Category
    </h2>

    <!-- Category Name Input -->
    <div class="mb-5">
      <label class="block mb-2 font-medium text-white">
        Category Name
      </label>
      <input
        type="text"
        value="{{ $category->name }}"
        name="name"
        class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]"
        required
      />
    </div>

    <!-- Logo Input -->
    <div class="mb-6">
      <label class="block mb-2 font-medium text-white">Logo</label>

      @if($category->logo)
      <div class="mb-4">
        <img
          src="{{ asset('storage/' . $category->logo) }}"
          alt="Current Logo"
          class="w-20 h-20 object-cover rounded filter invert brightness-0"
        />
      </div>
      @endif

      <input
        type="file"
        name="logo"
        class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]"
      />
    </div>

    <!-- Submit Button -->
    <button
      type="submit"
      class="w-full sm:w-auto bg-[#3182CE] hover:bg-[#2B6CB0] text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center transition"
    >
      Update
    </button>
  </form>
</section>


@endsection

