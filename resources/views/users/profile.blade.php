<x-default :heading="$heading">

    <!-- background cover up to nav -->
    <section style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg')}}')" 
    class = "bg-darkGreenBPC w-full h-[200px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
        
    </section>

    <div class="bg-gray-100">
        <div class="container mx-0 md:mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2">
                <!-- Left Side -->
                <div class="w-[calc(100vw-40px)] md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-greenBPC rounded-lg shadow-lg">
                        <div class="image overflow-hidden rounded-full aspect-square">
                            <img class="w-full h-full mx-auto object-cover"
                                src="{{auth()->user()->displayPhoto ? asset('storage/'.auth()->user()->displayPhoto) : asset('storage/userProfileIconNav.png') }}"
                                alt="">
                        </div>
                        <div class="flex items-center space-x-2 my-4 ml-4 font-bold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <img class="h-5" src = "{{ URL::asset('assets/icons/changeDP.png') }}"> 
                        </span>
                        <span class="tracking-wide">Change Photo</span>
                        </div>                               
                        
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded-lg shadow-sm">
                            
                            <li class="flex items-center py-3">
                                <form class = "w-full" method="POST" action="changeProfilePicture" id="form-to-upload-picture" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="studentID" value="{{$user->studentID}}">
                                <div class="rounded-md border border-gray-100 w-full bg-white p-2 shadow-md">
                                    <input type="file" name="upload" accept="image/png" id="upload-image" class="flex flex-col rounded-full w-full hover:-translate-y-1 duration-500 " onchange="uploadImage()">
                                    @error('upload')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                    
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    
                </div>
                <!-- Right Side -->
                <div class="w-[calc(100vw-40px)] md:w-9/12 md:mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-lg rounded-lg">
                        <div class="flex items-center space-x-2 my-4 ml-4 font-bold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Student ID:</div>
                                    <div class="px-4 py-2">{{auth()->user()->studentID}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Full Name:</div>
                                    <div class="px-4 py-2">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Program:</div>
                                    <div class="px-4 py-2">{{auth()->user()->program}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Year & Section:</div>
                                    <div class="px-4 py-2">{{auth()->user()->yearLevel}} - {{auth()->user()->section}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email:</div>
                                    <div class="px-4 py-2">{{auth()->user()->email ?? 'None'}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 my-4 ml-4 font-bold text-gray-900 leading-8">
                            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 14 4 C 8.4886661 4 4 8.4886661 4 14 L 4 36 C 4 41.511334 8.4886661 46 14 46 L 36 46 C 41.511334 46 46 41.511334 46 36 L 46 14 C 46 8.4886661 41.511334 4 36 4 L 14 4 z M 14 6 L 36 6 C 40.430666 6 44 9.5693339 44 14 L 44 36 C 44 40.430666 40.430666 44 36 44 L 14 44 C 9.5693339 44 6 40.430666 6 36 L 6 14 C 6 9.5693339 9.5693339 6 14 6 z M 13 15 C 11.35503 15 10 16.35503 10 18 L 10 32 C 10 33.64497 11.35503 35 13 35 L 37 35 C 38.64497 35 40 33.64497 40 32 L 40 18 C 40 16.35503 38.64497 15 37 15 L 13 15 z M 13.414062 17 L 36.583984 17 L 27.677734 25.892578 C 26.18494 27.382984 23.796834 27.382819 22.304688 25.890625 L 13.414062 17 z M 38 18.412109 L 38 31.587891 L 31.402344 25 L 38 18.412109 z M 12 18.414062 L 18.585938 25 L 12 31.585938 L 12 18.414062 z M 29.988281 26.412109 L 36.585938 33 L 13.414062 33 L 20 26.414062 L 20.890625 27.304688 C 23.146478 29.56054 26.832638 29.562194 29.089844 27.308594 L 29.988281 26.412109 z"/></svg>
                            <span class="tracking-wide">Change Email</span>
                        </div>
                        <form action="{{URL('changeProfileEmail')}}" method="POST" class="flex w-full justify-center flex-wrap gap-3 items-center">
                            @csrf
                            <input type="hidden" name="studentID" value="{{$user->studentID}}">
                            <input type="email" name="email" id="" class="w-full mx-4 sm:mx-10 border border-gray-100 shadow-md rounded-lg focus:border-greenBPC focus:outline-none focus:ring-1 focus:ring-greenBPC" placeholder="Email">
                            <div class = "w-full flex justify-end">
                                <button
                                    class="block w-full mx-4 sm:mx-10 md:w-52 bg-greenBPC text-white text-sm font-semibold rounded-full hover:bg-darkGreenBPC hover:-translate-y-1 duration-500 focus:outline-none 
                                    p-3 my-4 shadow-md transition-all" type="submit">Save Changes 
                                </button>
                            </div>
                        </form>
                        <div class="flex items-center space-x-2 my-4 ml-4 font-bold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <img class="h-5" src = "../assets/icons/changePassword.png">
                            </span>
                            <span class="tracking-wide">Change Password</span>
                        </div>
                        <form action="{{URL('/changeProfilePassword')}}" method="POST" class="flex w-full justify-center flex-wrap gap-3 items-center">
                            @csrf
                            <input type="hidden" name="studentID" value="{{$user->studentID}}">
                            <input type="password" name="currentPassword" class="w-full mx-4 sm:mx-10 border border-gray-100 shadow-md rounded-lg focus:border-greenBPC focus:outline-none focus:ring-1 focus:ring-greenBPC" placeholder="Current Password">
                            @error('currentPassword')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror   
                            @error('wrongPassword')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <input type="password" name="newPassword" class="w-full mx-4 sm:mx-10 border border-gray-100 shadow-md rounded-lg focus:border-greenBPC focus:outline-none focus:ring-1 focus:ring-greenBPC" placeholder="New Password">
                            @error('newPassword')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror   
                            <div class = "w-full flex justify-end">
                                <button
                                    class="block w-full mx-4 sm:mx-10 md:w-52 bg-greenBPC text-white text-sm font-semibold rounded-full hover:bg-darkGreenBPC hover:-translate-y-1 duration-500 focus:outline-none 
                                    p-3 my-4 shadow-md transition-all" type="submit">Save Changes 
                                </button>
                            </div>
                        </form>
    
                    </div>
                    <!-- End of about section -->
                    
                    <div class="my-4"></div>
    
                    <!-- Certificates -->
                    <div class="bg-white p-3 shadow-md rounded-lg">
    
                        <div class="flex gap-[50px]">
                            <div>

                                <div class="flex items-center space-x-2 my-4 ml-4 font-bold text-gray-900 leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Certificate/s</span>
                                </div>

                                @if(count($cert->where('studentID', auth()->user()->studentID)) == 0)
                                    <p class = "text-gray-600 w-full text-center font-medium">
                                        No certificate/s found
                                    </p>
                                @else
                                    <ul class="list-inside flex flex-wrap">
                                        @foreach($cert->where('studentID', auth()->user()->studentID) as $c)

                                            <li class="font-medium p-3 border m-2 shadow-md rounded-md hover:bg-gray-200 hover:-translate-y-1 duration-500">
                                                <a class = "flex items-center" href = "{{URL($c->url)}}" target = "_blank">
                                                    {{$c->election()->first()->title}} - {{$c->election()->first()->campus}} Campus
                                                    <img class = "w-4 ml-4" src = "../assets/icons/downloadIcon.png">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
</div>

</x-default>