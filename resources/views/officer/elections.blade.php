<x-officerLayout :heading="$heading">
    <!-- contents -->
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
                        <div class="py-8 px-6 space-y-6 rounded-xl border overflow-auto border-gray-200 bg-white h-[calc(100vh-120px)]">
                            <!-- search function -->
                            <form class = "flex flex-col md:flex-row relative rounded-lg gap-1" action="{{URL('officer/candidates')}}">
                                @csrf
                                <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                rounded-lg focus:outline-none focus:border-gray-100" 
                                type = "text" name = "search"
                                placeholder = "Search Elections Here...">
                                <button type = "submit" class="text-xs h-fit bg-greenBPC p-3 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md w-fit">
                                    Search
                                </button>
                            </form>
                            <!-- cards container -->
                            <div class = "flex w-full flex-wrap">
                                @foreach ($elections as $election)
                                    <div class = "border border-gray-100 shadow-md w-full flex flex-col justify-center items-center py-4 rounded-md my-2 md:w-[calc(50%-16px)] md:mx-2 xl:w-[calc(33.33%-16px)] 2xl:w-[calc(25%-16px)]">
                                        <h2 class = " font-medium text-gray-700 flex justify-center w-full mb-3 text-center px-3 line-clamp-1">
                                            {{{$election->title}}} - {{$election->campus}} Campus
                                        </h2>
                                        @if($election->status == 'Completed')
                                            <a href = "{{URL('officer/candidates', ['election' => $election->id])}}" class = "text-sm bg-greenBPC flex flex-row items-center justify-center w-9/12 py-2 rounded-md md hover:bg-darkGreenBPC transition-all">
                                                <svg class = "fill-white w-4 h-4 mr-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 4h20v2H0V7zm0 4h20v2H0v-2zm0 4h20v2H0v-2z"/></svg>
                                                <span class = "text-white">
                                                    View Candidates
                                                </span>
                                            </a>
                                        @else
                                            <a href = "{{URL('officer/candidates', ['election' => $election->id])}}" class = "text-sm bg-greenBPC flex flex-row items-center justify-center w-9/12 py-2 rounded-md md hover:bg-darkGreenBPC transition-all">
                                                <svg class = "fill-white w-4 h-4 mr-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                                    <g id="XMLID_23_">
                                                        <path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
                                                            c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
                                                            C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z"/>
                                                        <path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
                                                            C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z"
                                                            />
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
                                                <span class = "text-white">
                                                    Edit Candidates
                                                </span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
</x-officerLayout>