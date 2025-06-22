@extends('layouts.user')

@section('content2')

<saction >
    
<div class=" px-4 py-5 sm:p-0    ">
    
          <dl class="sm:divide-y sm:divide-white ">
          
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                
                <dt class="font-medium text-white">
                <h1 class="text-white font-bold  text-xl">My account</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 rounded-full"  viewBox="0 -960 960 960"  fill="#FFFFFF"><path d="M480-480.67q-66 0-109.67-43.66Q326.67-568 326.67-634t43.66-109.67Q414-787.33 480-787.33t109.67 43.66Q633.33-700 633.33-634t-43.66 109.67Q546-480.67 480-480.67ZM160-160v-100q0-36.67 18.5-64.17T226.67-366q65.33-30.33 127.66-45.5 62.34-15.17 125.67-15.17t125.33 15.5q62 15.5 127.28 45.3 30.54 14.42 48.96 41.81Q800-296.67 800-260v100H160Zm66.67-66.67h506.66V-260q0-14.33-8.16-27-8.17-12.67-20.5-19-60.67-29.67-114.34-41.83Q536.67-360 480-360t-111 12.17Q314.67-335.67 254.67-306q-12.34 6.33-20.17 19-7.83 12.67-7.83 27v33.33ZM480-547.33q37 0 61.83-24.84Q566.67-597 566.67-634t-24.84-61.83Q517-720.67 480-720.67t-61.83 24.84Q393.33-671 393.33-634t24.84 61.83Q443-547.33 480-547.33Zm0-86.67Zm0 407.33Z"/></svg>
                </dt>
              
              
          </div>

            <!--user details-->
              <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class=" font-medium text-white">
                      Username:
                  </dt>
                  <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                  {{Auth::user()->name}}
                  </dd>
              </div>
              <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6  ">
                  <dt class=" font-medium text-white">
                      Email address:
                  </dt>
                  <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                  {{Auth::user()->email}} 
                  </dd>
              </div>
              <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class=" font-medium text-white">
                    Action:
                  </dt>
                  <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                <a href="{{route('Profile.edit',$User->id)}}">  <button type="button" class="text-white bg-green-700  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">Edit</button></a>
                  </dd>
              </div>
              <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                 
              </div>
              
          </dl>
      </div>

    <!--my houses section-->
   
     
</saction>
<section>
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">My house</h2>
    </div>

    <div class="   grid grid-cols-1 md:grid-cols-2 gap-8 mb-6 lg:mb-16">
      @foreach($house as $h)
      @if($h->users_id == Auth::user()->id)
      <div class=" transform transition duration-500 hover:scale-105 flex flex-col sm:flex-row items-center  rounded-lg shadow border-[#2C3E50] bg-[#4A5568] overflow-hidden">
        
        @if(count($h->img) > 0)
        <div class="w-full sm:w-1/2 aspect-w-4 aspect-h-3 sm:aspect-auto sm:h-auto">
  <img
    data-modal-target="{{$h->id}}"
    data-modal-toggle="{{$h->id}}"
    src="{{ asset('storage/' . $h->img[0]) }}"
    alt="House Image"
    class="w-full h-full object-cover rounded-t sm:rounded-l sm:rounded-t-none"
  >
</div>
        @endif

        <div class="p-5 w-full sm:w-1/2 flex flex-col justify-between">
          <span class="text-white mt-2"><strong>City:</strong> {{ $h->City }}</span>
          <span class="text-white mt-2"><strong>Location:</strong> {{ $h->location }}</span>
          <span class="text-white mt-2"><strong>Description:</strong> {{ $h->dec_ }}</span>

          <ul class="flex flex-wrap gap-2 text-sm text-white mt-2">
            <li class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                <path d="m276-528 204-336 204 336H276ZM696-96q-70 0-119-49t-49-119q0-70 49-119t119-49q70 0 119 49t49 119q0 70-49 119T696-96Zm-552-24v-288h288v288H144Zm551.77-48Q736-168 764-195.77q28-27.78 28-68Q792-304 764.23-332q-27.78-28-68-28Q656-360 628-332.23q-28 27.78-28 68Q600-224 627.77-196q27.78 28 68 28ZM216-192h144v-144H216v144Zm188-408h152l-76-125-76 125Zm76 0ZM360-336Zm331 67Z" />
              </svg>
              {{ $h->category_name }}
            </li>
            <li class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                <path d="M444-144v-80q-51-11-87.5-46T305-357l74-30q8 36 40.5 64.5T487-294q39 0 64-20t25-52q0-30-22.5-50T474-456q-78-28-114-61.5T324-604q0-50 32.5-86t87.5-47v-79h72v79q72 12 96.5 55t25.5 45l-70 29q-8-26-32-43t-53-17q-35 0-58 18t-23 44q0 26 25 44.5t93 41.5q70 23 102 60t32 94q0 57-37 96t-101 49v77h-72Z" />
              </svg>
              {{ $h->price }}
            </li>
            <li class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                <path d="M160-120v-375l-72 55-48-64 120-92v-124h80v63l240-183 440 336-48 63-72-54v375H160Zm80-80h200v-160h80v160h200v-356L480-739 240-556v356Zm-80-560q0-50 35-85t85-35q17 0 28.5-11.5T320-920h80q0 50-35 85t-85 35q-17 0-28.5 11.5T240-760h-80Zm80 560h480-480Z" />
              </svg>
              {{ $h->numofR }}
            </li>
          </ul>

          <h1 class="text-white font-bold mt-4"><strong>Status:</strong> {{ $h->status }}</h1>

          <div class="flex flex-col sm:flex-row flex-wrap gap-2 mt-4">
            
          <a href="{{route('houses.edit',$h->id)}}"><button type="button" class="text-white  font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none bg-green-700">
              Edit
            </button>
</a>
<form action="{{ route('houses.destroy', $h->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this house?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
              Delete
            </button>
          </form>
          </div>
        </div>
      </div>
      @endif
      @endforeach
     
  </div>
   @if($house->count()==0)
        <h1 class="text-white text-center col-span-full">
     No houses 
</h1>
      @endif
</section>



@foreach($house as $h)
    <div id="{{ $h->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
               
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $h->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
               
            

<div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        
        @if(is_array($h->img) && count($h->img) > 0)
        @foreach($h->img as $image)
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
        <img src="{{ asset('storage/' . $image) }}" alt="House Image" class="w-full h-full object-cover rounded " >
        </div>
           
        @endforeach
    @else
        <span class="text-gray-400">No images</span>
    @endif
        
    </div>
    
    <!-- Slider indicators -->
    @if(is_array($h->img) && count($h->img) > 0)
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach($h->img as $index => $image)
                <button type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"
                        data-carousel-slide-to="{{ $index }}">
                </button>
            @endforeach
        </div>
    @endif
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


               

            </div>
            <!-- Modal footer -->
           
        </div>
    </div>
</div>
@endforeach

<section>
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">My Booking</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6 lg:mb-16">
     
      @foreach($booking as $b)
       @if($b->status == "approved")
      
      
        @if($b->users_id == Auth::user()->id)
          <div class="transform transition duration-500 hover:scale-105 flex flex-col sm:flex-row items-center  rounded-lg shadow border-[#2C3E50] bg-[#4A5568] overflow-hidden">
            
            @if(count($b->house->img) > 0)
              <div class="w-full sm:w-1/2 aspect-w-4 aspect-h-3 sm:aspect-auto sm:h-auto">
                <img 
                  data-modal-target="{{$b->house->id}}" 
                  data-modal-toggle="{{$b->house->id}}"
                  class="w-full h-full object-cover rounded-t sm:rounded-l sm:rounded-t-none"
                  src="{{ asset('storage/' . $b->house->img[0]) }}" 
                  alt="House Image"
                >
              </div>
            @endif

            <div class="p-5 w-full sm:w-1/2 flex flex-col justify-between">
              <span class="text-white mt-2"><strong>City:</strong> {{ $b->house->City }}</span>
              <span class="text-white mt-2"><strong>Location:</strong> {{ $b->house->location }}</span>
              <span class="text-white mt-2"><strong>Description:</strong> {{ $b->house->dec_ }}</span>
               <span class="text-white mt-2"><strong>Check_in:</strong> {{ $b->check_in }}</span>
               <span class="text-white mt-2"><strong>Check_out:</strong> {{ $b->check_out }}</span>

              <ul class="flex flex-wrap gap-2 text-sm text-white mt-2">
                <li class="flex items-center gap-1">
                   <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                <path d="m276-528 204-336 204 336H276ZM696-96q-70 0-119-49t-49-119q0-70 49-119t119-49q70 0 119 49t49 119q0 70-49 119T696-96Zm-552-24v-288h288v288H144Zm551.77-48Q736-168 764-195.77q28-27.78 28-68Q792-304 764.23-332q-27.78-28-68-28Q656-360 628-332.23q-28 27.78-28 68Q600-224 627.77-196q27.78 28 68 28ZM216-192h144v-144H216v144Zm188-408h152l-76-125-76 125Zm76 0ZM360-336Zm331 67Z" />
              </svg>
                  {{ $b->house->category_name }}
                </li>
                <li class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                    <path d="M444-144v-80q-51-11-87.5-46T305-357l74-30q8 36 40.5 64.5T487-294q39 0 64-20t25-52q0-30-22.5-50T474-456q-78-28-114-61.5T324-604q0-50 32.5-86t87.5-47v-79h72v79q72 12 96.5 55t25.5 45l-70 29q-8-26-32-43t-53-17q-35 0-58 18t-23 44q0 26 25 44.5t93 41.5q70 23 102 60t32 94q0 57-37 96t-101 49v77h-72Z"/>
                  </svg>
                  {{ $b->house->price }}
                </li>
                <li class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="#FFFFFF">
                    <path d="M160-120v-375l-72 55-48-64 120-92v-124h80v63l240-183 440 336-48 63-72-54v375H160Zm80-80h200v-160h80v160h200v-356L480-739 240-556v356Z"/>
                  </svg>
                  {{ $b->house->numofR }}
                </li>
              </ul>

              <h1 class="text-white font-bold mt-4"><strong>Status:</strong> {{ $b->status }}</h1>

              <div class="flex flex-col sm:flex-row flex-wrap gap-2 mt-4">
                <a href="{{ route('bookings.edit', $b->id) }}">
                  <button type="button"  class="text-white font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none bg-green-700">
                    Edit
                  </button>
                </a>

                <form action="{{route('bookings.destroy',$b->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this house?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endif
        @endif
      @endforeach
      @if($booking->count()==0)
        <div class="text-white text-center col-span-full">
     No booking 
        </div>
      @endif
    </div>
  </div>
</section>








@endsection