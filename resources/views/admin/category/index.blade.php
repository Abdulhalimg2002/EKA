@extends('layouts.dashboard')

@section('content1')

<section class="p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="relative shadow-xl shadow-black sm:rounded-lg overflow-hidden bg-[#4A5568]">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                <form method="GET" action="{{ route('category.index') }}" class="flex items-center">
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
            required
        >
    </div>
</form>

                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="{{route('category.create')}}">
                        <button type="button" class="flex items-center justify-center text-white font-medium rounded-lg text-sm px-4 py-2 bg-[#3182CE]">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Category
                        </button>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-white">
                    <thead class="text-xs text-white uppercase bg-[#4A5568] text-white text-center">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Logo</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-white text-center text-bold">
                        @foreach($Category as $Category)
                        <tr class="border-b border-white">
                            <td class="px-4 py-3">{{$Category->id}}</td>
                            <td class="px-4 py-3">{{$Category->name}}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $Category->logo) }}" alt="" class="w-20 h-20 object-cover rounded mx-auto shrink-0 filter invert brightness-0">
                            </td>
                            <td class="px-4 py-3 text-bold text-white">
                                <div class="flex flex-wrap justify-center space-x-2">
                                    <a href="{{ route('category.edit', $Category->id) }}">
                                        <button type="button" class="text-white bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Edit</button>
                                    </a>
                                    <form action="{{ route('category.destroy', $Category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Delete</button>
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


@endsection


                                 