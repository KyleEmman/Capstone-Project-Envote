<x-officerLayout :heading="$heading">
    <!-- contents -->
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
          
                    <div class="flex" >
                        <!-- card1 - profile -->
                        <div class="w-full grow mb-6 py-8 px-6 space-y-6 md:w-[calc(50%-32px)] md:mx-4 rounded-xl border border-gray-200 bg-white">
                            <!-- profile -->
                            <div class = "flex flex-col w-full">
                                <!-- title -->
                                <div>
                                    <h2 class = "font-medium text-lg text-gray-600">Profile</h2>
                                </div>
                                <div class = "flex-col w-full">
                                    <!-- photo -->
                                    <form method="POST" action="{{URL('/officer/settings/changePhoto')}}" enctype="multipart/form-data">
                                        @csrf
                                        <label class = "w-full flex justify-center my-7 relative cursor-pointer" id="change-photo-button">
                                            <input type="file" name="officerPhoto" class='hidden' accept="image/*" onchange="this.closest('form').submit()">
                                            <img class = "object-cover w-40 rounded-full h-40 object-center" src = "{{auth()->guard('officer')->user()->displayPhoto ? asset('storage/'.auth()->guard('officer')->user()->displayPhoto) : URL::asset('/assets/icons/userProfileIcon.png')}}">
                                            <span id="photo-tooltip" class = "object-cover w-40 rounded-full h-40 object-center flex items-center justify-center opacity-50 transition-all">Change Photo</span>
                                        </label>
                                        @error('officerPhoto')
                                            <p class="text-red-500 text-xs">{{$message}}</p>
                                        @enderror
                                    </form>
                                    
                                    <!-- informations -->
                                    <form class = "" method="POST" action="{{URL("/officer/settings/changeDetails")}}">
                                        @csrf
                                        <div class = "flex-col w-full">
                                            <!-- first name -->
                                            <label class = "text-gray-600 text-sm font-medium mt-5" for="fname">First Name</label>
                                            <div class = "flex flex-col mb-5 w-full relative">
                                                <input type = "text" id = "fnameEdit" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                name = "firstName" value = "{{$officer->firstName}}" disabled required>
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
                                                <input type = "text" id = "lnameEdit" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                name = "lastName" value = "{{$officer->lastName}}" disabled required>
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
                                                <input type = "text" id = "usernameEdit" class = "text-base rounded-lg border shadow-sm 
                                                border-gray-100 text-gray-600 font-medium p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                                name = "username" value = "{{$officer->username}}" disabled>
                                            </div>
                                            <input type = "submit" class = " rounded-lg border shadow-sm cursor-pointer
                                            border-gray-100 p-2 w-full bg-greenBPC text-white hover:bg-darkGreenBPC text-sm transition-all" value = "Save">
                                        </div>
                                    </form>
                                    <!-- change password -->
                                    <form class = "" method="POST" action="{{URL("/officer/settings/changePassword")}}" onsubmit="return passwordForm(event)">
                                        @csrf
                                        <!-- title -->
                                        <div class = "w-full text-center my-4 mt-7">
                                            <h2 class = "text-gray-600 font-medium">Change password</h2>
                                        </div>
                                        <!-- current password -->
                                        <label class = "text-gray-600 text-sm font-medium mt-5" for="currentPassword">Current Password</label>
                                        <div class = "flex flex-col mb-5 w-full relative">
                                            <input type = "password" id = "currentPassword" class = "rounded-lg border shadow-sm 
                                            border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                            name = "currentPassword" value = "" placeholder="Enter your current password" required>
                                            <p class="text-sm text-red-600 mt-1"></p>
                                            @error('currentPassword')
                                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                            @enderror
                                            @error('wrongPassword')
                                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- new password -->
                                        <label class = "text-gray-600 text-sm font-medium mt-5" for="password">New Password</label>
                                        <div class = "flex flex-col mb-5 w-full relative">
                                            <input type = "password" id = "newPassword" class = "rounded-lg border shadow-sm 
                                            border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                            name = "newPassword" value = "" placeholder="Enter your new password" required>
                                            <p class="text-sm text-red-600 mt-1"></p>
                                            @error('newPassword')
                                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- confirm password -->
                                        <label class = "text-gray-600 text-sm font-medium mt-5" for="passwordConfirm">Confirm Password</label>
                                        <div class = "flex flex-col mb-5 w-full relative">
                                            <input type = "password" id = "confirmPassword" class = "rounded-lg border shadow-sm 
                                            border-gray-100 text-gray-600 p-3 focus:outline-none focus:ring-0 focus:border-darkGreenBPC"
                                            name = "confirmPassword" value = "" placeholder="Re-enter your new password" required>
                                            <p class="text-sm text-red-600 mt-1"></p>
                                            @error('confirmPassword')
                                                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <input type = "submit" class = " rounded-lg border shadow-sm cursor-pointer
                                        border-gray-100 p-2 w-full bg-greenBPC text-white hover:bg-darkGreenBPC text-sm transition-all" value = "Change Password">
                                    </form>
        
                                </div>
                            </div>
                        </div>
    
               
    
                    </div>
            
            </div>
        </div>
    <script>
        function passwordForm(e){
            const currentPassword = document.getElementById("currentPassword")
            const newPassword = document.getElementById("newPassword")
            const confirmPassword = document.getElementById("confirmPassword")
            let flag = true
            if (currentPassword.value.length < 8) {
                currentPassword.nextElementSibling.innerText = "Must be at least 8 characters"
                flag = false
            }
            else {
                currentPassword.nextElementSibling.innerText = ""
            }
            if (newPassword.value.length < 8) {
                newPassword.nextElementSibling.innerText = "Must be at least 8 characters"
                flag = false
            }
            else {
                newPassword.nextElementSibling.innerText = ""
            }
            if (confirmPassword.value.length < 8) {
                confirmPassword.nextElementSibling.innerText = "Must be at least 8 characters"
                flag = false
            }
            else {
                confirmPassword.nextElementSibling.innerText = ""
            }
            if (flag == false) return false
            else if (flag == true) return true
        }
    </script>
</x-officerLayout>