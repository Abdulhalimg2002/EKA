<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <title>Document</title>
</head>
<body class="bg-[#2D3748]">



<nav class="bg-[#1A202C]  ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('assests/52c3b1ef-ecf5-4f3d-8602-9e0109372dd3-removebg-preview.png') }}" class="w-[60px] sm:w-[100px]"  />
       
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4   md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0   ">
       <li class="flex items-center py-2 px-3 text-white  md:p-0">
  <!-- الأيقونة خارج الرابط -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height="24px"
    viewBox="0 -960 960 960"
    width="24px"
    fill="#FFFFFF"
    class="w-[24px] h-[24px] text-white"
  >
    <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
  </svg>

  <!-- النص داخل الرابط -->
  <a href="{{route('home')}}" class="ml-2 text-white hover:text-[#2B6CB0]">
    Home
  </a>
</li>

        <li class="flex items-center py-2 px-3 text-white  md:p-0">
  <!-- الأيقونة خارج الرابط -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height="24px"
    viewBox="0 -960 960 960"
    width="24px"
    fill="#FFFFFF"
    class="w-[24px] h-[24px] text-white"
  >
    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
  </svg>

  <!-- النص داخل الرابط -->
  <a href="{{route('houses.create')}}" class="ml-2 text-white hover:text-[#2B6CB0]">
    Create house
  </a>
</li>

   <li class="flex items-center py-2 px-3 text-white  md:p-0">
  <div class="relative flex-shrink-0">
    <svg
      class="w-[32px] h-[32px] text-white rounded"
      aria-hidden="true"
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      fill="none"
      viewBox="0 0 24 24"
    >
      <path
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="1.3"
        d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z"
      />
    </svg>
    <!-- النقطة الحمراء فوق الأيقونة -->
@if($UnreadNotificationsCount > 0)
    <span class="absolute min-w-[12px] min-h-[12px] rounded-full bg-red-500 top-0 right-0 translate-x-2/4 -translate-y-2/4">
        {{ number_format($UnreadNotificationsCount) }}
    </span>
@endif
  </div>

  <a
    href="{{route('Unotifications.index')}}"
    class="ml-2 text-white hover:text-[#2B6CB0]"
  >
    Notification
  </a>
</li>



       
        
<!--dropdown-->
          <a href="#"
        <span id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="block py-2 px-3 text-white rounded-sm hover:text-[#2B6CB0]  md:border-0  md:p-0   text-center inline-flex items-center">My account<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></span></a>
     

          <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-[#232D3F] divide-y divide-gray-100 rounded-lg shadow-sm w-90 ">
                <ul class="py-2 text-sm text-white " aria-labelledby="dropdownDefaultButton">
                  <li>
                    <a href="#" class="flex items-center p-2 text-base font-medium rounded-lg text-white hover:bg-[#2B6CB0] group"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e8eaed"><path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm253.88-184.67q-58.21 0-98.05-39.95Q342-526.58 342-584.79t39.96-98.04q39.95-39.84 98.16-39.84 58.21 0 98.05 39.96Q618-642.75 618-584.54t-39.96 98.04q-39.95 39.83-98.16 39.83ZM480.31-80q-82.64 0-155.64-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.51T80-480.18q0-82.82 31.5-155.49 31.5-72.66 85.83-127Q251.67-817 324.51-848.5T480.18-880q82.82 0 155.49 31.5 72.66 31.5 127 85.83Q817-708.33 848.5-635.65 880-562.96 880-480.31q0 82.64-31.5 155.64-31.5 73-85.83 127.34Q708.33-143 635.65-111.5 562.96-80 480.31-80Zm-.31-66.67q54.33 0 105-15.83t97.67-52.17q-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83Zm0-366.66q31.33 0 51.33-20t20-51.34q0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20Zm0-71.34Zm0 369.34Z"/></svg><span class="ml-3">{{Auth::user()->name}}</span></a>
                  </li>
                  <li>
                    <a href="{{route('Profile')}}" class="flex items-center p-2 text-base font-medium rounded-lg text-white hover:bg-[#2B6CB0] group"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e8eaed"><path d="M480-480.67q-66 0-109.67-43.66Q326.67-568 326.67-634t43.66-109.67Q414-787.33 480-787.33t109.67 43.66Q633.33-700 633.33-634t-43.66 109.67Q546-480.67 480-480.67ZM160-160v-100q0-36.67 18.5-64.17T226.67-366q65.33-30.33 127.66-45.5 62.34-15.17 125.67-15.17t125.33 15.5q62 15.5 127.28 45.3 30.54 14.42 48.96 41.81Q800-296.67 800-260v100H160Zm66.67-66.67h506.66V-260q0-14.33-8.16-27-8.17-12.67-20.5-19-60.67-29.67-114.34-41.83Q536.67-360 480-360t-111 12.17Q314.67-335.67 254.67-306q-12.34 6.33-20.17 19-7.83 12.67-7.83 27v33.33ZM480-547.33q37 0 61.83-24.84Q566.67-597 566.67-634t-24.84-61.83Q517-720.67 480-720.67t-61.83 24.84Q393.33-671 393.33-634t24.84 61.83Q443-547.33 480-547.33Zm0-86.67Zm0 407.33Z"/></svg><span class="ml-3">profile</span></a>
                  </li>
                  
                  <li>
                  <a
  href="#"
  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
  class="flex items-center p-2 text-base font-medium rounded-lg text-white hover:bg-[#2B6CB0] group"
>
<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e8eaed"><path d="M186.67-120q-27 0-46.84-19.83Q120-159.67 120-186.67v-586.66q0-27 19.83-46.84Q159.67-840 186.67-840h292.66v66.67H186.67v586.66h292.66V-120H186.67Zm470.66-176.67-47-48 102-102H360v-66.66h351l-102-102 47-48 184 184-182.67 182.66Z"/></svg>
  <span class="ml-3">Log out</span>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
                  </li>
                </ul>
            </div>
      </ul>
    </div>
  </div>
</nav>



  
    <main >
    @yield('content2')
</min>
    
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>