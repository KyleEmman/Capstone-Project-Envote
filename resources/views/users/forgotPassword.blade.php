<x-authenticateLayout :heading="$heading">

    <form action="{{URL('/forgotPassword/retrieve')}}" method = "post" class="p-8 mt-6 mb-0 rounded-lg shadow-2xl space-y-4" enctype="multipart/form-data">
    @csrf
    <p class="text-lg font-medium">Retrieve your account</p>

    <div>
        <label for="username" class="text-sm font-medium">Username</label>

        <div class="relative mt-1">
        <input
            type="text"
            id="username"
            name = "username"
            class="w-full p-3 pr-12 text-sm border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Enter your username" value = "{{old('username')}}"
        />
        @error('username')
            <div class = "text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    </div>

    <div>
        <label for="password" class="text-sm font-medium">Reason</label>

        <div class="relative mt-1">
        <textarea
            id="reason"
            name = "reason"
            class="w-full p-3 pr-12 text-sm resize-none border-gray-200 rounded-lg shadow-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-darkGreenBPC"
            placeholder="Enter reason"
        >{{old('reason')}}</textarea>
        @error('reason')
            <div class = "text-red-600 text-sm">{{ $message }}</div>
        @enderror
        
        </div>
    </div>
    <div>
        <label for="file" class="text-sm font-medium">Proof of Identity</label>

        <div class="rounded-md w-full bg-white p-2">
        <input type="file" name="proof" id="upload-image" class="flex flex-col rounded-full w-full hover:-translate-y-1 duration-500 " onchange="uploadImage()">
        @error('proof')
            <div class = "text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    </div>

    <button type="submit" class="block w-full px-5 py-3 text-sm font-medium text-white bg-greenBPC rounded-full hover:bg-darkGreenBPC hover:-translate-y-1 hover:shadow-lg duration-500">
        Submit
    </button>

    <p class="text-sm text-center text-gray-500">
        <a class="underline" href="{{URL('/login')}}">Cancel</a>
    </p>

    </form>

</x-authenticateLayout>