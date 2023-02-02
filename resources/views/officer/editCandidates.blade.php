<x-officerLayout :heading="$heading">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #manageCandidatesNav{
                background-color:#017106;
                color: white;
            }
            #manageCandidatesNav > svg * {
                fill: white;
            }
            #manageCandidatesNav:hover {
                color:white !important;
            }
        </style>
            <!-- header -->
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">
                        Manage Candidates
                    </h5>
    
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
    
            <div class="px-6 pt-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <!-- white container -->
                        <div class="py-8 px-6 space-y-6 rounded-xl border overflow-auto border-gray-200 bg-white h-[calc(100vh-120px)]">
                            <div class = "w-full py-3 mt-[-20px] mb-3 flex">
                                <a class="mx-8 p-3 py-[10px] font-medium text-gray-700
                                pr-10 w-auto text-sm shadow-black/[0.07] flex items-center"
                                href="{{URL('/officer/candidates')}}">
                                    <img class = "w-5 mr-2 opacity-75" src="{{URL("../assets/icons/backgIcon.png")}}" alt="">
                                    Back
                                </a>
                    
                            </div>
                            <div class = "w-full flex-col relative py-8">
                                <h1 class = "text-center text-lg font-medium text-darkGreenBPC absolute right-0 left-0 top-0 h-[50px] flex items-center justify-center">
                                    {{$election->title}} - {{$election->campus}} Campus<br>
                                    Status: {{$election->status}}
                                </h1>
                                
                                <div class="space-y-6 flex flex-col gap-1 mt-[18px] pt-4">
                                    @foreach ($positions as $position)
                                        <div>
                                            <!-- position title -->
                                            <h2 class="text-center font-medium text-gray-600 text-xl">
                                                {{$position->title}}
                                            </h2>
        
                                            <!-- candidates container -->
                                            <div class = "flex w-full flex-wrap justify-center">
                                                @foreach ($position->candidates()->get() as $candidate)
                                                <!-- individual candidates -->
                                                <div class = "bg-white shadow-md border border-gray-100 py-5 px-4 rounded-lg w-full md:w-[calc(50%-16px)] md:mx-2 md:my-2 xl:w-[calc(33.33%-16px)]">
                                                    <div class="flex items-center flex-col relative">
                                                        <div class = "w-full flex justify-center">
                                                            <img src="{{$candidate->cprofile()->first()->displayPhoto ? asset('storage/'.$candidate->cprofile()->first()->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 object-cover overflow-hidden rounded-full md:ml-2">
                                                        </div>
                                                        <div class="flex flex-col w-full items-center">
                                                            <h2 class="font-bold text-lg mt-3 md:mt-0 text-black/80">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName ? substr($candidate->middleName, 0,1)."." : "")}} ({{$candidate->party}})</h2>
                                                            <button data-modal-toggle = "editCandidateModal{{$position->id}}{{$candidate->id}}" class = "text-sm bg-greenBPC max-w-[300px] 
                                                            flex flex-row items-center mt-3 justify-center w-full py-2 rounded-md md hover:bg-darkGreenBPC transition-all">
                                                                @if($election->status == 'Completed')
                                                                    <svg class = "fill-white w-4 h-4 mr-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>
                                                                @else
                                                                    <svg class = "fill-white w-4 h-4 mr-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                    viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                                                        <g id="XMLID_23_">
                                                                        <path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
                                                                        c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
                                                                        C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z"/>
                                                                        <path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
                                                                        C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z"
                                                                        /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                                                    </svg>
                                                                @endif
                                                                <span class = "text-white">
                                                                    @if($election->status == 'Completed')
                                                                        View
                                                                    @else
                                                                        Edit
                                                                    @endif
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- This is an example modal -->
                                                    <div class="max-w-2xl max-h-[80vh] mx-auto">
                                                        <!-- Main modal -->
                                                        <div id="editCandidateModal{{$position->id}}{{$candidate->id}}" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                            <div class="relative w-full max-w-2xl max-h-[80vh] px-4 h-full md:h-auto">
                                                                <!-- Modal content -->
                                                                <div class="bg-white rounded-lg shadow relative max-w-[500px] mx-auto dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                            @if($election->status == 'Completed')
                                                                            Profile
                                                                            @else
                                                                            Platform Editor
                                                                            @endif
                                                                        </h3>
                                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editCandidateModal{{$position->id}}{{$candidate->id}}">
                                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                        <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto pt-6 flex flex-col items-center">
                                                                            <!-- information -->
                                                                            <div class = "px-4 sm:px-10 font-bold text-gray-700 mt-3 w-full">
                                                                                <div class = "flex flex-wrap items-center justify-center mb-4">
                                                                                    <!-- change image -->
                                                                                    <div class = "w-[60%] flex flex-col justify-center items-center">
                                                                                        <img class = "w-32 h-32 object-cover rounded-full overflow-hidden mb-3" src = "{{$candidate->cprofile()->first()->displayPhoto ? asset('storage/'.$candidate->cprofile()->first()->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}">
                                                                                    </div>
                                                                                    <div class = "w-[40%] flex flex-col">
                                                                                        <h2 class="text-2xl my-2">{{$position->title}}</h2>
                                                                                        <h2 class=" my-2">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName ? substr($candidate->middleName, 0,1)."." : "")}}</h2>
                                                                                        <h2 class = " my-2">{{$candidate->program}} - {{$candidate->yearLevel}}{{$candidate->section}}</h2>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-justify font-light w-full flex flex-col">
                                                                                    @if($election->status == 'Completed')
                                                                                    <form class = "">
                                                                                        <label class = "font-medium text-gray-600 text-sm block mt-4">Platform:</label>
                                                                                        <textarea class = "font-normal resize-none w-full h-[200px] border-gray-200 rounded-lg" disabled>{{$candidate->cprofile()->first()->platforms}}</textarea>
                                                                                    @else
                                                                                    <form class = "" method="POST" action="{{URL('officer/candidates/update', ['cprofile' => $candidate->id])}}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <label class = "font-medium text-gray-600 text-sm block mb-2">Change Photo:</label>
                                                                                        <input class = "text-sm font-normal" type="file" name="displayPhoto" id="edit-candidate-image">
                                                                                        <label class = "font-medium text-gray-600 text-sm block mt-4">Edit Platform:</label>
                                                                                        <textarea name = "platforms" class = "font-normal resize-none w-full h-[200px] border-gray-200 rounded-lg" placeholder = "Enter candidate's platforms here...">{{$candidate->cprofile()->first()->platforms}}</textarea>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
        
                                                                        </div> 
                                                                            <!-- Modal footer -->
                                                                        <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                            <button data-modal-toggle="editCandidateModal{{$position->id}}{{$candidate->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Close</button>
                                                                            @if($election->status != 'Completed')
                                                                            <button type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                                                            @endif
                                                                        </div>
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>

</x-officerLayout>