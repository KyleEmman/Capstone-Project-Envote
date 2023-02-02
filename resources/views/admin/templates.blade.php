<x-adminLayout :heading="$heading">
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #electionsNav{
                background-color:#017106;
                color: white;
            }
            #electionsNav > svg * {
                fill: white;
            }
            #electionsNav:hover {
                color:white !important;
            }
            th, td {
                padding: 16px 0;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">
                        Position Templates
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
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                
                                <div class = "flex relative rounded-lg gap-1">
                    
                                    <a href = "{{URL('admin/elections')}}" class = "border border-gray-100 text-center p-3 px-5 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" 
                                    >Back</a>
                                </div>
                                <div class = "flex">
                                    <button class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md" data-modal-toggle="createElectionModal">
                                        <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                        <path style="fill:#ffffff;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                            s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                            /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                        </svg>
                                        Create Template
                                    </button>
                                </div>
                            </div>
                            <!-- create template modal -->
                            <div class = "max-h-[80vh]">
                                <div class="max-w-2xl max-h-[80vh] mx-auto">
                                    <div id="createElectionModal" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-full md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                        
                                        <div class="relative w-full max-w-2xl px-4 h-auto">
                                            <!-- Modal content -->
                                            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                        Create a Template
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createElectionModal">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                    </button>
                                                </div>
        
                                                <!-- Modal body -->
                                                <form action= "{{ URL('admin/elections/templates/store') }}" method = "POST" id="createTemplateForm">
                                                    @csrf
                                                    <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                        <label class="flex flex-col gap-1">
                                                            <p>Template Name:</p>
                                                            <input type="text" name="title" id="templateTitle" placeholder="Enter template title" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                            <p class="text-red-500 text-xs"></p>
                                                            @error('title')
                                                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                                            @enderror
                                                        </label>
                                                        <!-- positions -->
                                                        <span class = "flex flex-col">
                                                            <p>Positions Available:</p>
                                                            <span class = "flex flex-col" id = "positionsDynamic">
                                                                <span class = "flex relative items-center w-full">
                                                                    <input type="text" name="positionName[]" placeholder="Enter position name" class="positionField w-full border-1 pr-20 mb-2 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                    @error('positionName[]')
                                                                    <p class="text-red-500 text-xs absolute left-0 top-10">{{$message}}</p>
                                                                    @enderror
                                                                    <button class = "hidden absolute right-2 top-0 bottom-2 my-2 rounded-md text-white text-sm px-2 bg-red-600 hover:bg-red-800" onclick="return this.parentNode.remove()">Delete</button>
                                                                </span>
                                                            </span> 
                                                            <button type = "button" onclick = "addPosition(this)" class = "bg-greenBPC text-white mt-2 text-sm rounded-md py-2 px-4 hover:bg-darkGreenBPC transition-all">
                                                                Add position
                                                            </button>
                                                       
                                                        </span>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-toggle="createElectionModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                        <input type="submit" id = 'submitElectionForm'class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Create Template"/>
                                                    </div>
                                                </form>
                                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            {{-- templates container --}}
                            <div class="flex w-full flex-wrap">
                                @if(count($templates) == 0)
                                    <div class = "text-gray-500 font-medium text-lg w-full text-center">No records found</div>
                                @else
                                    @foreach ($templates as $template)
                                        <!-- update template modal -->
                                        <div class = "max-h-[80vh]">
                                            <div class="max-w-2xl max-h-[80vh] mx-auto">
                                                <div id="templateUpdate-{{$template->id}}" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-full md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                    
                                                    <div class="relative w-full max-w-2xl px-4 h-auto">
                                                        <!-- Modal content -->
                                                        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                    Create a Template
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="templateUpdate-{{$template->id}}">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                </button>
                                                            </div>
                    
                                                            <!-- Modal body -->
                                                            <form action= "{{ URL('admin/elections/templates/update', ['template' => $template->id]) }}" method= "POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                                    <label class="flex flex-col gap-1">
                                                                        <p>Template Name:</p>
                                                                        <input type="text" name="title" value = "{{$template->title}}" placeholder="Enter template title" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                        <p class="text-red-500 text-xs"></p>
                                                                        @error('title')
                                                                                <p class="text-red-500 text-xs">{{$message}}</p>
                                                                        @enderror
                                                                    </label>
                                                                    <!-- positions -->
                                                                    <span class = "flex flex-col">
                                                                        <p>Positions Available:</p>
                                                                        <span class = "flex flex-col" id = "positionsEdit-{{$template->id}}">
                                                                            @foreach($template->templateinfos()->get() as $templateinfo)
                                                                            <span class = "flex relative items-center w-full">
                                                                                <input type="text" name="positionName[]" value = "{{$templateinfo->positionName}}" placeholder="Enter position name" class="positionField w-full border-1 pr-20 mb-2 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                                @error('positionName[]')
                                                                                <p class="text-red-500 text-xs absolute left-0 top-10">{{$message}}</p>
                                                                                @enderror
                                                                                <button class = "absolute right-2 top-0 bottom-2 my-2 rounded-md text-white text-sm px-2 bg-red-600 hover:bg-red-800" onclick="return this.parentNode.remove()">Delete</button>
                                                                            </span>
                                                                            @endforeach
                                                                        </span> 
                                                                        <button type = "button" onclick = "addPosition(this)" class = "bg-greenBPC text-white mt-2 text-sm rounded-md py-2 px-4 hover:bg-darkGreenBPC transition-all">
                                                                            Add position
                                                                        </button>
                                                                
                                                                    </span>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-toggle="templateUpdate-{{$template->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                                    <input type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Update Template"/>
                                                                </div>
                                                            </form>
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "border border-gray-100 shadow-md w-full flex flex-col justify-center items-center py-4 rounded-md my-2 md:w-[calc(50%-16px)] md:mx-2 xl:w-[calc(33.33%-16px)] 2xl:w-[calc(25%-16px)]">
                                            <h2 class = " font-medium text-gray-700 flex justify-center w-full mb-3 text-center px-3">
                                                {{$template->title}}
                                            </h2>
                                            <div class = "w-full flex items-center justify-center flex-wrap">
                                                <button class = "text-sm bg-greenBPC flex flex-row items-center justify-center w-9/12 py-2 rounded-md md hover:bg-darkGreenBPC transition-all" data-modal-toggle="templateUpdate-{{$template->id}}">
                                                    <svg class = "fill-white w-4 h-4 mr-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                                        <g id="XMLID_23_">
                                                        <path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
                                                        c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
                                                        C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z"/>
                                                        <path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
                                                        C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z"
                                                        /></g> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                                    </svg>
                                                    <span class = "text-white">
                                                        Edit Template
                                                    </span>
                                                </button>
                                                <div class = "w-9/12 flex my-2 flex-wrap">
                                                    <form class = "w-[calc(50%-4px)] mr-2" method = "POST" action = "{{URL('admin/elections/templates/duplicate', ['template' => $template->id])}}">
                                                        @csrf
                                                        <button class = "text-sm bg-greenBPC flex flex-row items-center justify-center w-full py-2 rounded-md md hover:bg-darkGreenBPC transition-all">
                                                            <svg class = "fill-white w-4 h-4 sm:mr-3" version="1.1" viewBox="0 0 52 52" data-name="Layer 2" id="Layer_2" xmlns="http://www.w3.org/2000/svg"><path d="M15.16,43.55h-8a2,2,0,0,1-2-2V2a2,2,0,0,1,2-2h29.3a2,2,0,0,1,2,2v8a2,2,0,0,1-4,0V4H9.12V39.55h6a2,2,0,0,1,0,4Z"/>
                                                                <path d="M44.88,52H16.18a2,2,0,0,1-2-2V11.06a2,2,0,0,1,2-2h28.7a2,2,0,0,1,2,2V50A2,2,0,0,1,44.88,52Zm-26.7-4h24.7V13.06H18.18Z"/>
                                                                </svg>
                                                            <span class = "text-white hidden sm:block">
                                                                Duplicate
                                                            </span>
                                                        </button>  
                                                    </form>
                                                    <form class = "w-[calc(50%-4px)]" method = "POST" action = "{{URL('admin/elections/templates/delete', ['template' => $template->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class = "text-sm bg-red-700 flex flex-row items-center justify-center w-full py-2 rounded-md md hover:bg-red-800 transition-all">
                                                            <svg class = "fill-white w-4 h-4 sm:mr-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
                                                            <span class = "text-white hidden sm:block">
                                                                Delete
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    </div>
</x-adminLayout>