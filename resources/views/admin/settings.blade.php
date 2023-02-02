<x-adminLayout :heading="$heading">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #settingsNav{
                background-color:#017106;
                color: white;
            }
            #settingsNav > svg * {
                fill: white;
            }
            #settingsNav:hover {
                color:white !important;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2 !important;
            }
            #photo-tooltip {
                position: absolute;
                visibility: hidden;
                padding: 5px;
                background-color: black;
                color: white;
                text-align: center;
                z-index: 1; 
            }
            #change-photo-button:hover #photo-tooltip {
                visibility: visible;
            }
        </style>
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Settings</h5>
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
    
            <div class="px-6 pt-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
                    <div class="flex flex-wrap md:col-span-2 lg:col-span-1" >
                        <!-- card1 - profile -->
                        <div class="w-full mb-6 py-8 px-6 space-y-6 md:w-[calc(50%-32px)] md:mx-4 rounded-xl border border-gray-200 bg-white">
                            <!-- profile -->
                            <div class = "flex flex-col w-full">
                                <!-- title -->
                                <div>
                                    <h2 class = "font-medium text-lg text-gray-600">Profile</h2>
                                </div>
                                <div class = "flex-col w-full">
                                    <!-- photo -->
                                    <form method="POST" action="{{URL('/admin/settings/changePhoto')}}" enctype="multipart/form-data">
                                        @csrf
                                        <label class = "w-full flex justify-center my-7 relative cursor-pointer" id="change-photo-button">
                                            <input type="file" name="adminPhoto" class='hidden' accept="image/*" onchange="this.closest('form').submit()">
                                            <img class = "object-cover w-40 rounded-full h-40 object-center" src = "{{auth()->guard('admin')->user()->displayPhoto ? asset('storage/'.auth()->guard('admin')->user()->displayPhoto) : URL::asset('/assets/icons/userProfileIcon.png')}}">
                                            <span id="photo-tooltip" class = "object-cover w-40 rounded-full h-40 object-center flex items-center justify-center opacity-50 transition-all">Change Photo</span>
                                        </label>
                                        @error('adminPhoto')
                                            <p class="text-red-500 text-xs">{{$message}}</p>
                                        @enderror
                                    </form>
                                    
                                    <!-- informations -->
                                    <form class = "" method="POST" action="{{ URL('admin/settings/changeAdminDetails')}}">
                                        @csrf
                                        <div class = "flex-col w-full">
                                            <!-- first name -->
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="fname">First Name</label>
                                            <div class = "flex flex-col mb-5 w-full relative">
                                                <input type = "text" id = "fnameEdit" name = "firstName" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "{{ auth()->guard('admin')->user()->firstName}}" disabled>
                                                <button type = "button" onclick = "editInfoToggle(this)" class = "absolute right-0 bottom-0 top-0 mr-3">
                                                    <svg class = "w-4 h-4 fill-gray-600" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="494.936px" height="494.936px" viewBox="0 0 494.936 494.936" style="enable-background:new 0 0 494.936 494.936;"
                                                    xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                                        c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                                        s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                                        c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                                    <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                                        c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                                        c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                                        C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                                        l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                                        c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- last name -->
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="lname">Last Name</label>
                                            <div class = "flex flex-col mb-5 w-full relative">
                                                <input type = "text" id = "lnameEdit" name="lastName" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "{{ auth()->guard('admin')->user()->lastName}}" disabled>
                                                <button type = "button" onclick = "editInfoToggle(this)" class = "absolute right-0 bottom-0 top-0 mr-3">
                                                    <svg class = "w-4 h-4 fill-gray-600" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="494.936px" height="494.936px" viewBox="0 0 494.936 494.936" style="enable-background:new 0 0 494.936 494.936;"
                                                    xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                                        c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                                        s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                                        c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                                    <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                                        c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                                        c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                                        C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                                        l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                                        c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- user name -->
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="username">Username</label>
                                            <div class = "flex flex-col mb-5 w-full relative">
                                                <input type = "text" id = "usernameEdit" name= "username" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "{{ auth()->guard('admin')->user()->username}}" disabled>
                                            </div>
                                            @error('Required')
                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror  
                                            <input type = "submit" class = " rounded-lg mt-4 border shadow-sm 
                                            border-gray-100 p-2 w-full cursor-pointer bg-greenBPC text-white hover:bg-darkGreenBPC text-sm transition-all" value = "Save">
                                        </div>
                                    </form>
                                    <!-- change password -->
                                    <form method = "POST" action = "{{URL('/admin/settings/changePassword')}}" class = "">
                                    @csrf
                                        <!-- title -->
                                        <div class = "w-full text-center my-4 mt-7">
                                            <h2 class = "text-gray-600 font-medium">Change password</h2>
                                        </div>
                                        <!-- current password -->
                                        <div>
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="currentPassword">Current Password</label>
                                            <div class = "flex flex-col w-full relative mb-5">
                                                <input type = "password" id = "currentPassword" name = "currentPassword" class = "rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "" placeholder="Enter your current password">
                                                @error('currentPassword')
                                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- new password -->
                                        <div>
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="password">New Password</label>
                                            <div class = "flex flex-col w-full relative mb-5">
                                                <input type = "password" id = "password" name="password" class = "rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "" placeholder="Enter your new password">
                                                @error('password')
                                                <p class="text-red-500 text-xs">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- confirm password -->
                                        <div>
                                        <label class = "text-gray-600 text-sm font-medium mt-5" for="passwordConfirm">Confirm Password</label>
                                            <div class = "flex flex-col w-full relative mb-5">
                                                <input type = "password" id = "passwordConfirm" name = "password_confirmation" class = "rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                value = "" placeholder="Re-enter your new password">
                                                @error('password_confirmation')
                                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type = "submit" name = "changePassword" class = " rounded-lg border shadow-sm 
                                        border-gray-100 p-2 w-full cursor-pointer bg-greenBPC text-white hover:bg-darkGreenBPC text-sm transition-all" value = "Change Password">
                                    </form>
        
                                </div>
                            </div>
                        </div>
    
                        <div class="w-full py-8 mb-6 px-6 space-y-6 md:w-[calc(50%-32px)] md:mx-4 rounded-xl border border-gray-200 bg-white">
                            <!-- admins -->
                            <div class = "h-1/2 flex flex-col w-full">
                                <!-- title -->
                                <div class = "h-full text-sm">
                                    <h2 class = "font-medium rounded-md text-lg text-gray-600 mb-3">
                                        Administrators
                                    </h2>
                                    <div class = "h-[calc(100%-50px)] min-h-[200px] rounded-md w-full overflow-auto border border-gray-100 px-2">
                                        <table class = "w-full min-w-[400px]">
                                            <thead>
                                                <th class = "py-2">Photo</th>
                                                <th class = "py-2">Username</th>
                                                <th class = "py-2">Name</th>
                                                <th class = "py-2">Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                <tr class = "bg-white">
                                                    <td class = "text-center py-2">
                                                        <img class = "w-6 h-6 inline-block object-cover rounded-full" src = "{{$admin->displayPhoto ? asset('storage/'.$admin->displayPhoto) : URL::asset('/assets/icons/userProfileIcon.png')}}">
                                                    </td>
                                                    <td class = " py-2 text-center">
                                                        {{$admin->username}}
                                                    </td>
                                                    <td class = " py-2 text-center">
                                                        {{$admin->firstName}} {{$admin->lastName}}
                                                    </td>
                                                    <td class = " py-2 text-center">
                                                        <form method = "POST" action = "{{route('resetPassword', ['adminID' => $admin->id])}}">
                                                        @csrf
                                                            <button type = "submit" 
                                                            class = "bg-red-400 inline-block hover:bg-red-800 rounded-md text-white p-2 transition-all ">
                                                                Reset Password
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach

    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- officers -->
                            <div class = "h-1/2 flex flex-col w-full">
                                <!-- title -->
                                <div class = "h-full text-sm">
                                    <h2 class = "font-medium text-lg text-gray-600 mb-3 flex justify-between items-center">
                                        <span>
                                            Student Officers
                                        </span>
                                        <button class = "bg-greenBPC hover:bg-darkGreenBPC transition-all text-white flex items-center text-xs p-2 rounded-md" data-modal-toggle="addStudentOfficer">
                                            <svg class = "w-2 h-2 mr-1 fill-white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                            <path d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                            s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                            /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                            </svg>
                                            Add
                                        </button>
                                    </h2>
                                    <div class = "h-[calc(100%-50px)] min-h-[200px] rounded-md w-full overflow-scroll border border-gray-100 px-2">
                                        <table class = "w-full min-w-[450px]">
                                            <thead>
                                                <th class = "py-2">Photo</th>
                                                <th class = "py-2">Username</th>
                                                <th class = "py-2">Name</th>
                                                <th class = "py-2">Action</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

                                                @foreach ($officers as $officer)
                                                    <tr class = "bg-white">
                                                        <td class = "text-center py-2">
                                                            <img class = "w-6 h-6 inline-block object-cover rounded-full" src = "{{$officer->displayPhoto ? asset('storage/'.$officer->displayPhoto) : URL::asset('/assets/icons/userProfileIcon.png')}}">
                                                        </td>
                                                        <td class = " py-2 text-center">
                                                            {{$officer->username}}
                                                        </td>
                                                        <td class = " py-2 text-center">
                                                            {{$officer->firstName}} {{$officer->lastName}}
                                                        </td>
                                                        <td class = " py-2 text-center">
                                                            <form method='POST' action = "{{route('resetOfficerPassword', ['officerID' => $officer->id])}}">
                                                                @csrf
                                                                <button type="submit" class = "bg-red-400 inline-block hover:bg-red-800 rounded-md text-white p-2 transition-all ">
                                                                    Reset Password
                                                                </button>
                                                        
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <!-- delete officer button -->
                                                            <form method="POST" action = "{{ URL('admin/settings/officers/deleteOfficer', ['officerID' => $officer->id]) }}">
                                                            @csrf
                                                            <button class = "bg-red-700 rounded-md p-2">
                                                                <svg class = "w-4 fill-white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 458.5 458.5" style="enable-background:new 0 0 458.5 458.5;" xml:space="preserve">
                                                            <g>
                                                            <g>
                                                                <g>
                                                                    <path d="M382.078,57.069h-89.78C289.128,25.075,262.064,0,229.249,0S169.37,25.075,166.2,57.069H76.421
                                                                        c-26.938,0-48.854,21.916-48.854,48.854c0,26.125,20.613,47.524,46.429,48.793V399.5c0,32.533,26.467,59,59,59h192.508
                                                                        c32.533,0,59-26.467,59-59V154.717c25.816-1.269,46.429-22.668,46.429-48.793C430.933,78.985,409.017,57.069,382.078,57.069z
                                                                            M229.249,30c16.244,0,29.807,11.673,32.76,27.069h-65.52C199.442,41.673,213.005,30,229.249,30z M354.503,399.501
                                                                        c0,15.991-13.009,29-29,29H132.995c-15.991,0-29-13.009-29-29V154.778c12.244,0,240.932,0,250.508,0V399.501z M382.078,124.778
                                                                        c-3.127,0-302.998,0-305.657,0c-10.396,0-18.854-8.458-18.854-18.854S66.025,87.07,76.421,87.07h305.657
                                                                        c10.396,0,18.854,8.458,18.854,18.854S392.475,124.778,382.078,124.778z"/>
                                                                    <path d="M229.249,392.323c8.284,0,15-6.716,15-15V203.618c0-8.284-6.715-15-15-15c-8.284,0-15,6.716-15,15v173.705
                                                                        C214.249,385.607,220.965,392.323,229.249,392.323z"/>
                                                                    <path d="M306.671,392.323c8.284,0,15-6.716,15-15V203.618c0-8.284-6.716-15-15-15s-15,6.716-15,15v173.705
                                                                        C291.671,385.607,298.387,392.323,306.671,392.323z"/>
                                                                    <path d="M151.828,392.323c8.284,0,15-6.716,15-15V203.618c0-8.284-6.716-15-15-15c-8.284,0-15,6.716-15,15v173.705
                                                                        C136.828,385.607,143.544,392.323,151.828,392.323z"/>
                                                                </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                </svg> 
                                                            </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            <!-- create officer modal -->
            <div class = "max-h-[80vh]">
                <div class="max-w-2xl max-h-[80vh] mx-auto">
                    <div id="addStudentOfficer" data-modal-show="false" aria-hidden="true" class="bg-black/25 hidden overflow-x-hidden overflow-y-auto fixed h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                        
                        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="bg-white rounded-lg shadow absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[500px] max-w-[85vw] dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                        Add an officer
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addStudentOfficer">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                    </button>
                                </div>
    
                                <!-- Modal body -->
                                <form action="{{ URL('/admin/settings/officers') }}" method = "POST" id="addStudentOfficerForm" onsubmit="return validateForm(event)">
                                    @csrf
                                        <div class="h-[calc(100vh-540px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                            <div class="flex flex-col">
                                                <label for="officerUsername">Username</label>
                                                <input placeholder='Enter officer username' type="text" name="username" id="officerUsername" class="officerInput border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                <p class="text-red-500 text-xs error-p"></p>
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="officerFirstName">First Name</label>
                                                <input placeholder='Enter officer name' type="text" name="firstName" id="officerFirstName" class="officerInput border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                <p class="text-red-500 text-xs error-p"></p>
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="officerLastName">Last Name</label>
                                                <input placeholder='Enter officer name' type="text" name="lastName" id="officerLastName" class="officerInput border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                <p class="text-red-500 text-xs error-p"></p>
                                            </div>
                                        </div>

                                    <!-- Modal footer -->
                                    <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-toggle = "addStudentOfficer" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" id="cancelButton">Cancel</button>
                                        <button id="submitOfficerAdd" type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <script>
            addOfficerForm = document.getElementById("addStudentOfficerForm")
            const inputFields = addOfficerForm.querySelectorAll(".officerInput")
            function validateForm(e) {
            inputFields.forEach(input => {
                if (input.value == "") {
                input.nextElementSibling.innerHTML = "Field Required"
                return (false, e.preventDefault())
                }
                else {
                input.nextElementSibling.innerHTML = ""
                return true
                }
            })
            }
        </script>
        
</x-adminLayout>