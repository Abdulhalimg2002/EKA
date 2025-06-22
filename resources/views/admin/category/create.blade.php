@extends('layouts.dashboard')

@section('content1');


<section >
<form class="w-full sm:max-w-md md:max-w-lg mx-auto border border-[#718096] rounded-xl p-4 sm:p-6 md:p-10 bg-[#4A5568] shadow-xl shadow-black " action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-white">Create Category</h2>
  <div class="mb-5">
    <label  class="block mb-2 font-medium text-bold text-white"><b>category name</b></label>
    <input type="text" name="name" class=" border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" placeholder="" required />
  </div>
  <div class="mb-5">
    <label  class="block mb-2 font-medium text-white">Logo</label>
    <input type="file" name="logo"  class=" border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" required />
  </div>
 
  <button type="submit" class="text-white bg-[#3182CE] font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</section>
@endsection



