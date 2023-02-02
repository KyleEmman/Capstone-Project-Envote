<x-officerLayout :heading="$heading">
    <!-- contents -->
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #contentManagementNav{
                background-color:#017106;
                color: white;
            }
            #contentManagementNav > svg * {
                fill: white;
            }
            #contentManagementNav:hover {
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
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Content Management</h5>
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
                            <div class = "flex flex-col md:flex-row justify-between md:gap-0 w-full">
                                <div class="flex flex-wrap justify-between w-full flex-col sm:flex-row gap-3">
                                    <form class = "flex flex-row relative rounded-lg gap-1" action="{{URL('officer/contentManagement')}}" method="GET">
                                        @csrf
                                        <input class = "border border-gray-100 p-3 pr-10 text-xs shadow-sm shadow-black/[0.07]
                                        rounded-lg focus:outline-none focus:border-gray-100 w-full md:w-fit" 
                                        type = "text" name = "search"
                                        placeholder = "Search News Here...">
                                        <button type = "submit" class="text-xs h-fit bg-greenBPC p-3 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md w-fit">
                                            Search
                                        </button>
                                    </form>
                                        <button type = "button" class="text-xs h-fit bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md w-fit" data-modal-toggle="createAnnouncementModal">
                                            <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                            <path style="fill:#ffffff;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                                s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                                /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                            </svg>
                                            Add News
                                        </button>
                                </div>
    
                                
                                <div id="createAnnouncementModal" data-modal-show="false" aria-hidden="true" class="bg-black/25 hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    
                                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg overflow-auto shadow absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[90vw] md:w-[500px] dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                    Add Announcement
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createAnnouncementModal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{URL('officer/announcement/store')}}" method = "POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class = "overflow-auto h-[calc(100vh-400px)] min-h-[200px]">
                                                    <div class="p-6 py-2 min-h-[200px] space-y-1 flex flex-col gap-1">
                                                        <label class="flex flex-col gap-1">
                                                            <p class = "text-gray-600 font-medium text-sm">Announcement Title</p>
                                                            <input type="text" name="title" placeholder="Enter announcement title" value = "" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                        </label>
                                                        <label class="flex flex-col gap-1">
                                                            <p class = "text-gray-600 font-medium text-sm">Upload Image Heading</p>
                                                            <input type="file" name="cover" id="announcement-image" accept="image/*" required>
                                                        </label>
                                                        <label class="flex flex-col gap-1">
                                                            <p class = "text-gray-600 font-medium text-sm">Announcement Content</p>
                                                            <textarea name="content" cols="20" rows="10" class="focus:ring-greenBPC rounded-md resize-none border border-gray-200 focus:border-greenBPC" required></textarea>
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-toggle="createAnnouncementModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                <button type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Announcement</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    
                                </div>
            
                            </div>
                            <section class="grid grid-cols-1 gap-2 mx-1 md:grid-cols-2">
                                @foreach ($announcements as $announcement)
                                <a href="{{URL("/officer/editAnnouncement/" . $announcement->announcementID)}}">
                                    <div
                                    class = "w-full py-3 border border-gray-100 shadow-md rounded-xl my-3 mx-1 overflow-hidden relative hover:bg-gray-100 cursor-pointer"
                                    >
                                      <form method="POST" action="{{URL("/officer/deleteAnnouncement/" . $announcement->announcementID)}}">
                                        @csrf
                                        <button type="submit" class = "bg-red-700 hover:bg-red-800 rounded-md p-1 absolute top-2 right-2">
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
    
                                        <!-- content texts -->
                                        <div class = " mx-7">
                                            <!-- announcement title -->
                                            <h3 class="text-xl md:text-xl xl:text-2xl 
                                            text-darkGreenBPC font-medium mb-3 line-clamp-1">
                                                {{$announcement->title}}
                                            </h3>
    
                                            <h3 class="text-gray-600 text-sm my-2">{{$announcement->created_at->format('F j, Y')}}</h3>
    
                                            <!-- content announcement -->
                                            <div class = "mb-2 flex items-center overflow-hidden">
                                                <p class="text-justify text-xs text-gray-600 line-clamp-3">
                                                    {{$announcement->content}}
                                                </p>
                                            </div>
    
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </section>
                            <div class = "w-full">
                                {{$announcements->links()}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
</x-officerLayout>