@extends('layouts.user')

@section('content2')

<section class="py-8 md:py-12 antialiased">
 <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
       <h1 class="mb-4 text-4xl text-white font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl ">Details page</h1>  
      <p class="text-white">{{$house->dec_}}</p>

    </div>
  <div class= "relative w-full h-60 md:h-80 xl:h-[400px] rounded-lg">
    @if(is_array($house->img) && count($house->img) > 0)
      <div id="indicators-carousel-{{ $house->id }}" class="relative w-full h-full" data-carousel="static">
        <div class="relative w-full h-full">
          @foreach($house->img as $index => $image)
          <div class="{{ $index === 0 ? 'flex' : 'hidden' }} items-center justify-center duration-700 ease-in-out absolute inset-0" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $image) }}" alt="House Image" class="max-h-full max-w-full object-contain mx-auto rounded-lg">
          </div>
          @endforeach
        </div>

        <!-- Indicators -->
        <div class="absolute bottom-2 left-1/2 z-30 flex -translate-x-1/2 space-x-2">
          @foreach($house->img as $index => $image)
          <button type="button" class="w-2 h-2 rounded-full bg-white/80" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
          @endforeach
        </div>

        <!-- Controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-3" data-carousel-prev>
          <span class="w-7 h-7 bg-white/70 hover:bg-white/90 rounded-full flex items-center justify-center">
            <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" viewBox="0 0 6 10"><path stroke="currentColor" stroke-width="2" d="M5 1 1 5l4 4"/></svg>
          </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-3" data-carousel-next>
          <span class="w-7 h-7 bg-white/70 hover:bg-white/90 rounded-full flex items-center justify-center">
            <svg class="w-4 h-4 text-gray-800" viewBox="0 0 6 10"><path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
          </span>
        </button>
      </div>
      @endif
   
  </div>
  

<div class="relative overflow-x-auto mt-5  ">
    <table class="w-full text-sm rtl:text-right text-white ">
        <tbody  >
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    city
                </th>
                <td class="px-6 py-4">
                    {{$house->City}}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    location
                </th>
                <td class="px-6 py-4">
                    {{$house->location}}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    room number
                </th>
                <td class="px-6 py-4">
                    {{$house->numofR}}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    category
                </th>
                <td class="px-6 py-4">
                    {{$house->category_name}}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    owner
                </th>
                <td class="px-6 py-4">
                    {{ $house->User->name }}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    price per night
                </th>
                <td class="px-6 py-4">
                   {{ $house->price }}
                </td>
            </tr>
            <tr class=" border-b bg-[#2D3748] border-bg-[#718096] ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                    make reservation
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('booking.create', ['houseId' => $house->id]) }}">
  <button type="button" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-[#3182CE] ">
    Book Now
  </butt
                </td>
            </tr>
        </tbody>
    </table>
</div>

</section>





@endsection