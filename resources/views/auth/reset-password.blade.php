<x-guest-layout>
  <div class="flex items-center justify-center min-h-screen bg-[#2D3748] px-4">
    <form method="POST" action="{{ route('password.update') }}"
          class="relative flex flex-col md:flex-row m-6 space-y-8 md:space-y-0 md:space-x-8 bg-[#4A5568] border border-[#718096] shadow-2xl rounded-2xl max-w-4xl w-full overflow-hidden">
      @csrf

      <!-- Left Side: Image -->
      <div class="w-full md:w-1/2 hidden md:block">
        <img
          src="{{ asset('assests/52c3b1ef-ecf5-4f3d-8602-9e0109372dd3-removebg-preview.png') }}"
          alt="Reset Password"
          class="w-full h-auto object-cover" />
      </div>

      <!-- Right Side: Form -->
      <div class="flex flex-col justify-center p-8 md:p-14 w-full md:w-1/2 text-white">
        <h2 class="text-3xl font-bold mb-2">Reset your password</h2>
        <p class="text-sm mb-6">
          Enter your email and new password below to reset your account.
        </p>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4 text-red-300" />

        <!-- Hidden Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="py-2">
          <label for="email" class="mb-2 text-md block">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email', $request->email) }}"
            required autofocus
            placeholder="Enter your email"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Password -->
        <div class="py-2">
          <label for="password" class="mb-2 text-md block">New Password</label>
          <input
            type="password"
            name="password"
            id="password"
            required
            placeholder="••••••••"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Confirm Password -->
        <div class="py-2">
          <label for="password_confirmation" class="mb-2 text-md block">Confirm Password</label>
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            required
            placeholder="••••••••"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full mt-6 px-5 py-2.5 bg-[#3182CE] text-white text-sm font-medium rounded-lg text-center">
          Reset Password
        </button>

        <!-- Back to login -->
        <div class="text-center text-sm mt-4">
          <a href="{{ route('login') }}" class="hover:underline text-white">
            Back to Login
          </a>
        </div>
      </div>
    </form>
  </div>
</x-guest-layout>
