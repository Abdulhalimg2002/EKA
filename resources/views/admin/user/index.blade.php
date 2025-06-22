@extends('layouts.dashboard')

@section('content1')

<section class=" p-3 sm:p-5">
    <div class=" mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="  relative shadow-xl shadow-black sm:rounded-lg overflow-hidden bg-[#4A5568]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                <form class="flex items-center" action="{{ route('user.index') }}" method="GET">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input 
            type="text" 
            id="simple-search" 
            name="search" 
            class="w-full border border-[#718096] bg-[#4A5568] text-sm rounded-lg pl-10 p-2 text-white placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" 
            value="{{ request('search') }}" 
            placeholder="Search" 
        >
    </div>
</form>

                </div>
                
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-white text-center  ">
                    <thead class="text-xs  uppercase bg-[#4A5568] text-white text-center">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody class="text-white text-center text-bold">
                    @foreach($user as $item)
                        <tr class="border-b border-gray-200 ">
                            <th scope="row" class="px-4 py-3 font-medium text-bold text-white whitespace-nowrap">{{ $item->id }}</th>
                            
                            <td class="px-4 py-3 text-bold text-white">{{ $item->name }}</td>
                            <td class="px-4 py-3 text-bold text-white">{{ $item->email }}</td>
                            
                            <td class="px-4 py-3 text-bold text-white">
                             
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST"> 
    @csrf
    @method('DELETE')
    <button type="submit" class="text-white bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
</form>
                            </td>

                           
                        </tr>
                        @endforeach
                        
                        
                        
                    </tbody>
                </table>
                <div class="p-4">
    {{ $user->appends(['search' => request('search')])->links() }}
</div>

            </div>
            
        </div>
    </div>
    </section>

@endsection