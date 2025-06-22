@extends('layouts.dashboard')

@section('content1')


<section class="p-3 sm:p-5">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
    <!-- Search and top controls -->
    <div class="relative shadow-xl shadow-black sm:rounded-lg overflow-hidden bg-[#4A5568]">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">
          <form method="GET" action="{{ route('house.index') }}" class="w-full">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
             <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
              <input type="text" name="search" id="simple-search"
                class="w-full border border-[#718096] bg-[#4A5568] text-sm rounded-lg pl-10 p-2 text-white placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]"
                placeholder="Search" value="{{ request('search') }}">
            </div>
          </form>
        </div>
      </div>

      <!-- Responsive Table -->
      <div class="w-full overflow-x-auto">
        <table class="min-w-[1000px] w-full text-sm text-white text-center">
          <thead class="text-xs uppercase bg-[#4A5568] text-white">
            <tr>
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Image</th>
              <th class="px-4 py-3">Location</th>
              <th class="px-4 py-3">Description</th>
              <th class="px-4 py-3">Price</th>
              <th class="px-4 py-3">Rooms</th>
              <th class="px-4 py-3">City</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Category</th>
              <th class="px-4 py-3">User Name</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($houses as $house)
            <tr class="border-b border-gray-200">
              <th class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $house->id }}</th>
              <td class="px-4 py-3">
                <button data-modal-target="{{$house->id}}" data-modal-toggle="{{$house->id}}"
                  class="block text-white bg-[#FFD700] font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                  type="button">
                  Show Image
                </button>
              </td>
              <td class="px-4 py-3">{{ $house->location }}</td>
              <td class="px-4 py-3">{{ $house->dec_ }}</td>
              <td class="px-4 py-3">{{ $house->price }}</td>
              <td class="px-4 py-3">{{ $house->numofR }}</td>
              <td class="px-4 py-3">{{ $house->City }}</td>
              <td class="px-4 py-3">{{ $house->status }}</td>
              <td class="px-4 py-3">{{ $house->category_name }}</td>
              <td class="px-4 py-3">{{ $house->user_name }}</td>
              <td class="px-4 py-3">
                <div class="flex flex-col sm:flex-row gap-2 items-center justify-center">
                  <a href="{{ route('house.edit', $house->id) }}">
                    <button type="button"
                      class="text-white bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5">
                      Edit
                    </button>
                  </a>
                  <form action="{{ route('house.destroy', $house->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this house?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="text-white bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5">
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

   @foreach($houses as $house)
    <div id="{{ $house->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
               
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $house->id }}">
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
        
        @if(is_array($house->img) && count($house->img) > 0)
        @foreach($house->img as $image)
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
        <img src="{{ asset('storage/' . $image) }}" alt="House Image" class="w-80 h-80 object-cover rounded mx-auto " >
        </div>
           
        @endforeach
    @else
        <span class="text-gray-400">No images</span>
    @endif
        
    </div>
    
    <!-- Slider indicators -->
    @if(is_array($house->img) && count($house->img) > 0)
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach($house->img as $index => $image)
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
  
    
@endsection