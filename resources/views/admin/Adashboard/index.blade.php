@extends('layouts.dashboard')

@section('content1')



<div class="w-full p-5">


   
    <div class=" border-[#718096] bg-[#4A5568]">
  <h1 class="flex flex-col items-center justify-center text-white text-2xl">
    <b>Admin Dashboard</b>
  </h1>

  <div class="p-4 border-[#718096] bg-[#4A5568] rounded-lg md:p-8  text-center" id="stats" role="tabpanel" aria-labelledby="stats-tab">
    <dl class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 max-w-screen-xl mx-auto text-gray-900 dark:text-white sm:p-8">
      <div class="flex flex-col items-center justify-center">
        <dt class="mb-2 text-3xl font-extrabold text-center">{{ number_format($userCount) }}+</dt>
        <dd class="text-white">Users</dd>
      </div>
      <div class="flex flex-col items-center justify-center">
        <dt class="mb-2 text-3xl font-extrabold text-center">{{ number_format($houseCount) }}+</dt>
        <dd class="text-white">Houses</dd>
      </div>
      <div class="flex flex-col items-center justify-center">
        <dt class="mb-2 text-3xl font-extrabold text-center">{{ number_format($categoryCount) }}+</dt>
        <dd class="text-white">Category</dd>
      </div>
      <div class="flex flex-col items-center justify-center">
        <dt class="mb-2 text-3xl font-extrabold text-center">{{ number_format($unreadNotificationsCount) }}+</dt>
        <dd class="text-white">Notification</dd>
      </div>
    </dl>
  </div>
</div>

</div>



@endsection

