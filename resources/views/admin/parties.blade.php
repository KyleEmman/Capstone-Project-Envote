<x-adminLayout :heading="$heading">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #candidatesNav{
                background-color:#017106;
                color: white;
            }
            #candidatesNav > svg * {
                fill: white;
            }
            #candidatesNav:hover {
                color:white !important;
            }
            th, td {
                padding: 16px 0;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 rotate-[45deg] hidden" viewBox="0 0 1200 1200" id="logo">
            <defs>
            <style>
                
                .cls-1 {
                fill: #034919;
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
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Candidates</h5>
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
            {{-- tabs --}}
            <div class="px-6 pt-6 flex text-gray-500 font-semibold">
                <a href = "{{URL('admin/candidates')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white bg-[#e8e8e8]">
                    Applications
                </a>
                <a href = "{{URL('admin/candidates/archives')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                    Archives
                </a>
                <a href = "{{URL('admin/candidates/parties')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                    PartyLists
                </a>
            </div>
            <div class="px-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border overflow-auto rounded-tl-none border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                
                                <div class = "flex">
                                    <button class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md" data-modal-toggle="createPartyModal">
                                        <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                        <path style="fill:#ffffff;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                            s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                            /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                        </svg>
                                        Create party
                                    </button>
                                </div>
                            </div>
                                <!-- create party modal -->
                            <div class = "max-h-[80vh]">
                                <div class="max-w-2xl max-h-[80vh] mx-auto">
                                    <div id="createPartyModal" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-full md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                        
                                        <div class="relative w-full max-w-2xl px-4 h-auto">
                                            <!-- Modal content -->
                                            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                        Create a party
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createPartyModal">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                    </button>
                                                </div>
        
                                                <!-- Modal body -->
                                                <form action= "{{ URL('admin/elections/party/store') }}" method = "POST" id="createpartyForm">
                                                    @csrf
                                                    <div class="overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                        <label class="flex flex-col gap-1">
                                                            <p>Party Name:</p>
                                                            <input type="text" name="name" id="partyname" placeholder="Enter party name" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                            <p class="text-red-500 text-xs"></p>
                                                            @error('name')
                                                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                                            @enderror
                                                        </label>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-toggle="createPartyModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                        <input type="submit" id = 'submitPartyForm'class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Create party"/>
                                                    </div>
                                                </form>
                                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
            

                            {{-- partys container --}}
                            <div class="flex w-full flex-wrap">
                                @if(count($parties) == 0)
                                    <div class = "text-gray-500 font-medium text-lg w-full text-center">No records found</div>
                                @else
                                    @foreach ($parties as $party)
                                        <!-- update party modal -->
                                        <div class = "max-h-[80vh]">
                                            <div class="max-w-2xl max-h-[80vh] mx-auto">
                                                <div id="partyUpdate-{{$party->id}}" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-full md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">

                                                    <div class="relative w-full max-w-2xl px-4 h-auto">
                                                        <!-- Modal content -->
                                                        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                    Edit Party: {{$party->partyName}}
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="partyUpdate-{{$party->id}}">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                </button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <form action= "{{ URL('admin/elections/partys/update', ['party' => $party->id]) }}" method= "POST">
                                                                @csrf
                                                                <div class="overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                                    <label class="flex flex-col gap-1">
                                                                        <p>Party Name:</p>
                                                                        <input type="text" name="name" value = "{{$party->name}}" placeholder="Enter party name" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                        <p class="text-red-500 text-xs"></p>
                                                                        @error('name')
                                                                                <p class="text-red-500 text-xs">{{$message}}</p>
                                                                        @enderror
                                                                    </label>
                                                                    
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-toggle="partyUpdate-{{$party->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                                    <input type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Update Party"/>
                                                                </div>
                                                            </form>
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "border border-gray-100 shadow-md w-full flex flex-col justify-center items-center py-4 rounded-md my-2 md:w-[calc(50%-16px)] md:mx-2 xl:w-[calc(33.33%-16px)] 2xl:w-[calc(25%-16px)]">
                                            <h2 class = " font-medium text-gray-700 flex justify-center w-full mb-3 text-center px-3">
                                                {{$party->partyName}}
                                            </h2>
                                            <div class = "w-full flex items-center justify-center flex-wrap">
                                                <button class = "text-sm bg-greenBPC flex flex-row items-center justify-center w-9/12 py-2 rounded-md md hover:bg-darkGreenBPC transition-all" data-modal-toggle="partyUpdate-{{$party->id}}">
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
                                                        Edit Party
                                                    </span>
                                                </button>
                                                <div class = "w-9/12 flex my-2 flex-wrap">
                                                    <form class = "w-full" method = "POST" action = "{{URL('admin/elections/party/delete', ['party' => $party->id])}}">
                                                        @csrf
                                                        <button class = "w-full text-sm bg-red-700 flex flex-row items-center justify-center w-full py-2 rounded-md md hover:bg-red-800 transition-all">
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