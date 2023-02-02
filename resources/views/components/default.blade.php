@props(['heading'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$heading}}</title>
    <link rel="icon" href="{{ URL::asset('assets/icons/studentGovernmentLogo.png') }}" type="image/icon type">
    <link
      href="{{ URL::asset('https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css')}}"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/customStyle.css') }}" />
    <script src="{{ URL::asset('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
    <script src="{{ URL::asset('https://code.jquery.com/jquery-3.6.1.js') }}" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('https://unpkg.com/flowbite@1.4.0/dist/flowbite.js') }}" defer></script>
    <script src="{{ URL::asset('assets/js/script.js') }}" defer></script>
    <script src="{{ URL::asset('assets/js/ajaxFunctions.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class = "bg-gray-100">
    <div id = "spinner"></div>
    <!-- main content -->
    <main class = "relative">

        <!-- navbar container -->
        <div class = "w-full py-5 px-0 absolute z-40" id = "navigationContainer">

            <!-- app name -->
            <div class = "flex w-full justify-center" id = "navigationTitleContainer">
                <span class="w-fit flex font-medium text-white text-xl items-center" id = "navigationTitle">
                    <svg xmlns="http://www.w3.org/2000/svg" id = "envoteIcon" class="h-7 rotate-[45deg] mr-1" viewBox="0 0 1200 1200">
                        <defs>
                            <style>
                            .cls-1 {
                                fill: #ffffff;
                                fill-rule: evenodd;
                            }
                            </style>
                        </defs>
                        <path class="cls-1" d="M426.821,218.909L511.032,115.92,775.3,1006.2l-79.414,83.45Z"/>
                        <path class="cls-1" d="M416,190l93-92.008V1102.96L416,1014V190Z"/>
                        <path id="Rectangle_3_copy" data-name="Rectangle 3 copy" class="cls-1" d="M784.784,189.575L692.216,97.992V1098.32l92.568-88.55V189.575Z"/>
                        <path class="cls-1" d="M6.363,600L418.607,187.757l60.811,60.811L67.175,660.811Z"/>
                        <path id="Rectangle_2_copy" data-name="Rectangle 2 copy" class="cls-1" d="M66.8,541.988L478.993,954.2l-60.8,60.806L6,602.8Z"/>
                        <path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1193.64,601.875L781.747,1013.99,720.988,953.2,1132.88,541.082Z"/>
                        <path id="Rectangle_2_copy_3-2" data-name="Rectangle 2 copy 3" class="cls-1" d="M1133.25,659.869L721.413,247.777l60.751-60.789L1194,599.08Z"/>
                        <path id="Rectangle_2_copy_2" data-name="Rectangle 2 copy 2" class="cls-1" d="M71,557l408,0.019,0,85.991-408-.019Z"/>
                    </svg>
                    ENVote
                </span>
            </div>

            <!-- navigation bar -->
            <nav class="w-auto mx-5 bg-white/0 border-b border-white/60 flex flex-col md:flex-row items-center p-3 md:px-6" id = "navigationBar">
                <div class = "w-full flex justify-between items-center">

                    <!-- Title -->
                    <a href="{{ url('/') }}">
                        <span class = "flex items-center gap-3">
                            <img class = "w-14" src="{{ URL::asset('assets/icons/studentGovernmentLogo.png') }}" alt="">
                            <h1 class = "text-white text-[1rem] font-medium">
                                Bulacan Polytechnic College
                            </h1>
                        </span>
                    </a>
                    
                    <!-- Hamburger icon -->
                    <span class = "block md:hidden">
                        <div class="relative sm:max-w-xl mx-auto">
                            <nav x-data="{ open: false }">
                                <button class="text-gray-500 w-10 h-10 relative focus:outline-none" @click='open = !open' id = "navBarOpener">
                                    <div class="block w-5 absolute left-1/2 top-1/2 transform  -translate-x-1/2 -translate-y-1/2">
                                        <span id="bar1" aria-hidden="true" class="block absolute h-0.5 w-5 bg-white transform transition duration-500 ease-in-out" :class="{'rotate-45 openned': open,' -translate-y-1.5': !open }"></span>
                                        <span id="bar2" aria-hidden="true" class="block absolute  h-0.5 w-5 bg-white transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                                        <span id="bar3" aria-hidden="true" class="block absolute  h-0.5 w-5 bg-white transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                                    </div>
                                </button>
                            </nav>
                        </div>
                    </span>
                </div>
                <!-- dropdown menu -->
                <div class = "hidden w-full mt-3 md:mt-0 md:block rounded-md shadow-md md:shadow-none
                md:bg-transparent md:text-white bg-white text-darkGreenBPC font-medium" 
                id = "navDropDown">
                    <ul class = "w-full px-6 flex flex-col md:flex-row md:gap-10 my-3 justify-end">
                        <a class = "my-3 md:my-0 md:hidden flex items-center" href="{{URL('/profile')}}">
                            <img class = "w-4 opacity-70 mr-3"
                             src = "{{ URL::asset('assets/icons/userIcon.svg') }}">
                            <li class = "">Profile</li>
                        </a>
                        <a class = "my-3 md:my-0 flex items-center" href = "{{URL('/')}}">
                            <img class = "w-4 opacity-70 mr-3 md:hidden"
                            src = "{{ URL::asset('assets/icons/homeIcon.png') }}">
                            <li class = "">Home</li>  
                        </a>
                        <div class = "flex flex-col gap-4 relative" id = "electionsNav">
                            <div class = "flex items-center h-full">
                                <img class = "w-4 opacity-70 mr-3 md:hidden"
                                src = "{{ URL::asset('assets/icons/electionIcon.png') }}">
                                <li class = "my-3 md:my-0 flex items-center cursor-pointer">
                                    Elections
                                    <img class = "w-2 ml-3 md:invert" 
                                    src = "{{ URL::asset('assets/icons/triangleIcon.png') }}">
                                </li>
                            </div>
                            <!-- sub dropdown for elections -->
                            <div class = " mt-[-30px] ml-9 hidden
                            md:absolute md:mt-9 md:shadow-md
                            md:ml-[-60px] rounded-lg
                            md:bg-white text-darkGreenBPC md:w-52
                            md:block md:h-0 md:p-0 md:overflow-hidden
                            " 
                            id = "dropDownElectionsNav">
                                <a class = "my-3 md:my-0 flex items-center" href="{{URL('/ongoing')}}">
                                    <li class = "">Ongoing Elections</li>
                                </a>
                                <a class = "my-3 md:my-0 flex items-center" href="{{URL('/upcoming')}}">
                                    <li class = "">Upcoming Elections</li>
                                </a>
                                <a class = "my-3 md:my-0 flex items-center" href = "{{URL('/results')}}">
                                    <li class = "">Results</li>  
                                </a>
                            </div>
                        </div>
                        

                        <div class = "hidden flex-col gap-5 relative md:flex" id = "profileIcoNav">
                            <div class = "flex items-center h-full">
                                <button id = "dropDownButtonProfile">
                                    <li class = " w-9 h-9 overflow-hidden
                                    rounded-full">
                                        <img class = "w-full h-full object-cover" src = "{{auth()->user()->displayPhoto ? asset('storage/'.auth()->user()->displayPhoto) : asset('storage/userProfileIconNav.png') }}">
                                    </li>
                                </button>
                            </div>

                            <!-- dropdown profile -->
                            <span class = "absolute top-[36px] right-[-30px] hidden"
                            id = "dropDownProfile">
                                <div class = " bg-white rounded-md shadow-md text-gray-900 min-w-[215px] 
                                p-4  w-max flex flex-col">
                                
                                    <div class = "flex flex-col items-center justify-center">
                                        
                                        <div class = "rounded-full w-16 h-16 bg-slate-500 mb-4 overflow-hidden">
                                            <img class = "w-full h-full object-cover" src = "{{auth()->user()->displayPhoto ? asset('storage/'.auth()->user()->displayPhoto) : asset('storage/userProfileIconNav.png') }}">
                                        </div>
                                        <p class = "font-medium">
                                        {{auth()->user()->firstName}} {{auth()->user()->lastName}}
                                        </p>
                                        <p class = "text-xs">
                                            {{auth()->user()->program}} {{auth()->user()->yearLevel}} - {{auth()->user()->section}}
                                        </p>
                                    </div>
                                    <hr class = "my-3">
                                    <div class = "w-full flex flex-row justify-between text-sm">
                                        <a class = "my-3 md:my-0 flex items-center rounded-md px-3 py-2 bg-greenBPC text-white" href="{{ URL('profile') }}">
                                            <li class = "">
                                                Profile
                                            </li>
                                        </a>
                                        <a class = "my-3 md:my-0 flex items-center rounded-md px-3 text-white bg-orangeBPC" href = "{{ URL('/logout')}}">
                                            <li class = "">
                                                Sign out
                                            </li>  
                                        </a>
                                    </div>
                                
                                </div>
                            </span>
                        </div>

                        <hr class = "block md:hidden">
                        <a class = "my-3 md:my-0 flex items-center md:hidden" href = "{{ URL('/logout') }}">
                            <img class = "w-4 opacity-70 rotate-180 mr-3 md:hidden"
                            src = "{{ URL::asset('assets/icons/signOut.svg') }}">
                            <li class = "">Sign out</li>  
                        </a>
                    </ul>
                </div>  

            </nav>
            
        </div>
        
        {{$slot}}

    </main>
    <x-flashMessage />
    <script>
        var loader = document.getElementById("spinner");
        window.addEventListener("load", function(){
            loader.style.display = "none"
        })
    </script>
</body>
</html>