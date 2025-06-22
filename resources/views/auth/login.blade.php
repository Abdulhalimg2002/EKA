<x-guest-layout>
  <div class="flex items-center justify-center min-h-screen bg-[#2D3748] px-4">
    <form method="POST" action="{{ route('login') }}"
          class="relative flex flex-col md:flex-row m-6 space-y-8 md:space-y-0 md:space-x-8 bg-[#4A5568] border border-[#718096] shadow-2xl rounded-2xl max-w-5xl w-full overflow-hidden">
      @csrf

      <!-- Left Side: Image -->
      <div class="w-full md:w-1/2">
        <img
          src="{{ asset('assests/52c3b1ef-ecf5-4f3d-8602-9e0109372dd3-removebg-preview.png') }}"
          alt="img"
          class="w-full h-auto object-cover" />
      </div>

      <!-- Right Side: Form -->
      <div class="flex flex-col justify-center p-8 md:p-14 w-full md:w-1/2">
        <span class="mb-3 text-4xl font-bold text-white">Welcome to EAK</span>
        <span class="font-light text-white mb-8">Please enter your details</span>

        <!-- Email -->
        <div class="py-2">
          <label for="email" class="mb-2 text-md text-white block">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            required autofocus
            placeholder="Enter your email"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Password -->
        <div class="py-2">
          <label for="password" class="mb-2 text-md text-white block">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            required
            placeholder="••••••••"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Remember & Forgot -->
        <div class="flex justify-between w-full py-4 text-sm text-white">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="font-bold hover:underline">
              Forgot password?
            </a>
          @endif
        </div>

        <!-- Login Button -->
        <button
          type="submit"
          class="w-full sm:w-auto px-5 py-2.5 bg-[#3182CE] text-white text-sm font-medium rounded-lg text-center">
          Sign in
        </button>

        <!-- Signup Suggestion -->
        <div class="text-center text-white mt-6">
          Don't have an account?
          <a href="{{ route('register') }}" class="font-bold hover:underline text-white">Sign up</a>
        </div>
      </div>
    </form>
  </div>
</x-guest-layout>

