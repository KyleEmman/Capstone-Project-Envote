<x-authenticateLayout :heading="$heading">
     
    <form method = "POST" action="{{ URL('login/authenticate')}}" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
      @csrf
      
      <p class="text-lg font-medium">Log in to your account</p>

      <div>
        <label for="username" class="text-sm font-medium">Username</label>

        <div class="relative mt-1">
          <input
            type="text"
            id="username"
            name = "username"
            class="w-full p-3 pr-12 text-sm border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Enter your username" 
            value = "{{old('username')}}"
          />
          @error('username')
          <div class = "text-red-600 font-normal">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div>
        <label for="password" class="text-sm font-medium">Password</label>

        <div class="relative mt-1">
          <input
            type="password"
            id="password"
            name = "password"
            class="w-full p-3 pr-12 text-sm border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Enter password"
          />
          @error('password')
            <div class = "text-red-600 font-normal">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="block w-full px-5 py-3 text-sm font-medium text-white bg-greenBPC rounded-full hover:bg-darkGreenBPC hover:-translate-y-1 hover:shadow-lg duration-500">
        Sign in
      </button>

      <p class="text-sm text-center text-gray-500">
        <a class="underline" href="{{URL('/forgotPassword')}}">Forgot Password?</a>
      </p>

    </form>
   
</x-authenticateLayout>