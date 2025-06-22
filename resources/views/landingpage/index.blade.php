@extends('layouts.landingpage')

@section('content3')
<section class="bg-[#1A202C]">

    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
       
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl text-white animate__animated animate__backInRight">Welcome to EAK</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 ">Your Journey Starts Here We're here to make your travels smoother, safer, and more memorable.Whether you're searching for a cozy stay or a unique local experience, EAK offers a carefully curated selection of homes and accommodations that suit every style and need.With EAK, enjoy: Seamless booking Trusted hosts The comfort of feeling at home — anywhere you go.
Start your adventure today. Create unforgettable memories with EAK.</p>
       
        
    </div>
</section>
   <section class="  ">
        <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6  ">
            <img class="w-full " src="{{ asset('assests/undraw_team-work_i1f3.svg') }}" alt="dashboard image">
            
            <div class="mt-4 md:mt-0">
                <h2 id="about-title" class="mb-4 text-4xl tracking-tight font-extrabold text-white">About us:</h2>
                <p id="about-text" class="mb-6 font-light text-white md:text-lg ">EAK is your trusted partner for finding the perfect stay and unique local experiences.

Built on the values of comfort, convenience, and reliability, we connect travelers with handpicked accommodations that suit every lifestyle and budget. Whether you're planning a weekend escape, a long-term stay, or a spontaneous adventure, EAK ensures a smooth booking process, verified listings, and dedicated support.

With EAK, every journey becomes easier, safer, and more memorable.</p>
              
            </div>
        </div>
    </section>
    <section class=" py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-extrabold text-white mb-6">Our Features</h2>
    <p class="text-white mb-12">Why choose EAK for your next stay?</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 ">
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-house-chimney text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">Comfortable Stays</h3>
        <p class="text-white">Handpicked accommodations for a cozy and relaxing experience.</p>
      </div>
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-shield-halved text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">Secure Booking</h3>
        <p class="text-white">Safe and fast booking with end-to-end data protection.</p>
      </div>
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-headset text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">24/7 Support</h3>
        <p class="text-white">Our team is here to help you at any time, day or night.</p>
      </div>
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-globe text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">Wide Range of Locations</h3>
        <p class="text-white">Find homes across various cities and travel destinations.</p>
      </div>
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-thumbs-up text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">Trusted by Guests</h3>
        <p class="text-white">Highly rated by hundreds of satisfied travelers.</p>
      </div>
      <div class="p-6 rounded-lg shadow-md transition duration-500 hover:scale-105 bg-[#4A5568]">
        <i class="fa-solid fa-bolt text-indigo-600 text-4xl mb-4"></i>
        <h3 class="text-xl text-white font-semibold mb-2">Instant Booking</h3>
        <p class="text-white">Book instantly and get confirmation within seconds.</p>
      </div>
    </div>
  </div>
</section>



@endsection