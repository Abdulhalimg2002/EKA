@extends('layouts.user')

@section('content2')
<section class="bg-[#1A202C]">
@if(session('success'))
    <div id="success-message" class="mb-4 p-4 bg-green-600 text-white text-center rounded-lg shadow-md transition-opacity duration-1000">
        {{ session('success') }}
    </div>
@endif
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
       
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl text-white animate__animated animate__backInRight">Welcome <span>{{Auth::user()->name}}</span> to EAK</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 ">We're here to make your journey easier and more comfortable. Whether you're looking for a cozy place to stay or a unique local experience, we offer a carefully curated selection of accommodations to suit every taste and need.
With EAK, discover seamless booking, safety, and the comfort of feeling at home — wherever you are.
Get ready to create unforgettable memories with us!.</p>
       
        
    </div>
</section>
<section class="py-8 antialiased md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Category</h2>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <a href="{{ route('home') }}" class="flex items-center rounded-lg border border-[#718096] px-4 py-2 hover:bg-[#2B6CB0] bg-[#4A5568]">
    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm240 0q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm240 0q-33 0-56.5-23.5T640-240q0-33 23.5-56.5T720-320q33 0 56.5 23.5T800-240q0 33-23.5 56.5T720-160ZM240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400ZM240-640q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640Z"/></svg>
    <span class="text-sm font-medium text-white">All house</span>
</a>
      @foreach($Category as $category)
        <a href="{{ route('home', ['category_id' => $category->id]) }}" class="flex items-center rounded-lg border border-[#718096] px-4 py-2 hover:bg-[#2B6CB0] bg-[#4A5568] ">
          <img src="{{ asset('storage/' . $category->logo) }}" alt="" class="me-2 h-8 w-8 shrink-0 filter invert brightness-0">
          <span class="text-sm font-medium text-white">{{ $category->name }}</span>
        </a>
      @endforeach
    </div>
  
  </div>
</section>
<section class="py-8 md:py-12 antialiased">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mb-4 grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
   
      @foreach($houses as $house)
        @if($house->status == "approved")
        <div class="rounded-lg transform transition duration-500 hover:scale-105   p-4 shadow-sm border-[#2C3E50] bg-[#4A5568]">
          <div class="relative w-full h-56 md:h-64 xl:h-72 overflow-hidden rounded-lg">
            @if(is_array($house->img) && count($house->img) > 0)
              <div id="indicators-carousel-{{ $house->id }}" class="relative w-full h-full" data-carousel="static">
                <div class="relative w-full h-full">
                  @foreach($house->img as $index => $image)
                  <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image) }}" alt="House Image" class="w-full h-full object-cover rounded">
                  </div>
                  @endforeach
                </div>

                <!-- Indicators -->
                <div class="absolute bottom-2 left-1/2 z-30 flex -translate-x-1/2 space-x-2">
                  @foreach($house->img as $index => $image)
                  <button type="button" class="w-2 h-2 rounded-full bg-white" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                  @endforeach
                </div>

                <!-- Controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4" data-carousel-prev>
                  <span class="w-8 h-8 bg-white/50 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg"><path stroke="currentColor" stroke-width="2" d="M5 1 1 5l4 4"/></svg>
                  </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4" data-carousel-next>
                  <span class="w-8 h-8 bg-white/50 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-gray-800" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg"><path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                  </span>
                </button>
              </div>
            @else
              <div class="flex items-center justify-center h-full text-gray-400">No images</div>
            @endif
          </div>

          <div class="pt-4 space-y-2">
            <div class="flex justify-between items-center">
              <span class="text-sm px-2 py-0.5 rounded  text-white bg-blue-600">{{ $house->City }}</span>
            </div>

            <h3 class="text-white font-semibold text-base truncate">{{ $house->location }}</h3>

            <ul class="flex flex-wrap gap-2 text-sm text-white">
              <li class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M480-480q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42ZM192-192v-96q0-23 12.5-43.5T239-366q55-32 116.29-49 61.29-17 124.5-17t124.71 17Q666-398 721-366q22 13 34.5 34t12.5 44v96H192Zm72-72h432v-24q0-5.18-3.03-9.41-3.02-4.24-7.97-6.59-46-28-98-42t-107-14q-55 0-107 14t-98 42q-5 4-8 7.72-3 3.73-3 8.28v24Zm216.21-288Q510-552 531-573.21t21-51Q552-654 530.79-675t-51-21Q450-696 429-674.79t-21 51Q408-594 429.21-573t51 21Zm-.21-72Zm0 360Z"/></svg>
                {{ $house->User->name }}
              </li>
              <li class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="m276-528 204-336 204 336H276ZM696-96q-70 0-119-49t-49-119q0-70 49-119t119-49q70 0 119 49t49 119q0 70-49 119T696-96Zm-552-24v-288h288v288H144Zm551.77-48Q736-168 764-195.77q28-27.78 28-68Q792-304 764.23-332q-27.78-28-68-28Q656-360 628-332.23q-28 27.78-28 68Q600-224 627.77-196q27.78 28 68 28ZM216-192h144v-144H216v144Zm188-408h152l-76-125-76 125Zm76 0ZM360-336Zm331 67Z"/></svg>
                {{ $house->category_name }}
              </li>
            </ul>

            <p class="text-lg font-bold text-white">${{ $house->price }} <span>1Night</span></p>
           <a href="{{route('home.show',$house->id)}}"> <button type="button" class="text-white bg-[#3182CE]  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  ">Details</button></a>
          </div>
        </div>
        @endif
      @endforeach
      @if($houses->count()==0)
        <div class="text-white text-center col-span-full">
     No houses 
        </div>
      @endif
    </div>
  </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const message = document.getElementById("success-message");
        if (message) {
            setTimeout(() => {
                message.style.opacity = "0";
                setTimeout(() => {
                    message.style.display = "none";
                }, 1000); // بعد انتهاء التأثير
            }, 3000); // 3 ثوانٍ قبل الإخفاء
        }
    });
</script>


@endsection