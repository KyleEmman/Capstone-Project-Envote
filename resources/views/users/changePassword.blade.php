<x-authenticateLayout :heading="$heading">
     
    <form method = "POST" action="{{ URL('login/changePasswordActivity')}}" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4">
      @csrf
      <p class="text-lg font-medium">You need to change your password</p>

      <div>
        <label for="password" class="text-sm font-medium">New password</label>

        <div class="relative mt-1">
          <input
            type="password"
            id="password"
            name = "password"
            class="w-full p-3 pr-12 text-sm border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Enter new your password" 
            value = "{{old('password')}}"
          />
          
        </div>
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div>
        <label for="password_confirmation" class="text-sm font-medium">Confirm password</label>

        <div class="relative mt-1">
          <input
            type="password"
            id="password_confirmation"
            name = "password_confirmation"
            class="w-full p-3 pr-12 text-sm border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Confirm your password"
          />
        </div>
      </div>

      <button type="submit" class="block w-full px-5 py-3 text-sm font-medium text-white bg-greenBPC rounded-full hover:bg-darkGreenBPC hover:-translate-y-1 hover:shadow-lg duration-500">
        Change Password
      </button>

    </form>
   
</x-authenticateLayout>