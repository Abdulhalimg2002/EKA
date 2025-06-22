<x-guest-layout>
  <div class="flex items-center justify-center min-h-screen bg-[#2D3748] px-4">
    <form method="POST" action="{{ route('register') }}"
          class="relative flex flex-col md:flex-row m-6 space-y-8 md:space-y-0 md:space-x-8 bg-[#4A5568] border border-[#718096] shadow-2xl rounded-2xl max-w-5xl w-full overflow-hidden">
      @csrf

      <!-- Left Side: Image -->
      <div class="w-full md:w-1/2">
        <img
          src="{{ asset('assests/52c3b1ef-ecf5-4f3d-8602-9e0109372dd3-removebg-preview.png') }}"
          alt="Register image"
          class="w-full h-auto object-cover" />
      </div>

      <!-- Right Side: Form -->
      <div class="flex flex-col justify-center p-8 md:p-14 w-full md:w-1/2">
        <span class="mb-3 text-4xl font-bold text-white">Create an account</span>
        <span class="font-light text-white mb-8">Please fill in your details to register</span>

        <!-- Name -->
        <div class="py-2">
          <label for="name" class="mb-2 text-md text-white block">Name</label>
          <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            required autofocus
            placeholder="Enter your name"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Email -->
        <div class="py-2">
          <label for="email" class="mb-2 text-md text-white block">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            required
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

        <!-- Confirm Password -->
        <div class="py-2">
          <label for="password_confirmation" class="mb-2 text-md text-white block">Confirm Password</label>
          <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            required
            placeholder="••••••••"
            class="border border-[#718096] bg-[#4A5568] text-white text-sm rounded-lg block w-full p-2.5 placeholder-white focus:ring-[#63B3ED] focus:border-[#63B3ED]" />
        </div>

        <!-- Terms & Privacy Policy -->
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="flex items-start mt-4 text-white text-sm">
            <input type="checkbox" name="terms" id="terms" required class="mt-1 mr-2">
            <label for="terms" class="flex-1">
              {!! __('I agree to the :terms_of_service and :privacy_policy', [
                  'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-blue-300">'.__('Terms of Service').'</a>',
                  'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-blue-300">'.__('Privacy Policy').'</a>',
              ]) !!}
            </label>
          </div>
        @endif

        <!-- Register Button -->
        <button
          type="submit"
          class="w-full sm:w-auto mt-6 px-5 py-2.5 bg-[#3182CE] text-white text-sm font-medium rounded-lg text-center">
          Register
        </button>

        <!-- Login Link -->
        <div class="text-center text-white mt-6">
          Already have an account?
          <a href="{{ route('login') }}" class="font-bold hover:underline text-white">Sign in</a>
        </div>
      </div>
    </form>
  </div>
</x-guest-layout>
