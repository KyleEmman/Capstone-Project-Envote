<x-adminLayout :heading="$heading">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #passwordResetsNav{
                background-color:#017106;
                color: white;
            }
            #passwordResetsNav > svg * {
                fill: white;
            }
            #passwordResetsNav:hover {
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
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Password Resets</h5>
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
            <div class="px-6 pt-6 flex text-gray-500 font-semibold">
                <a href = ""
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                    Requests
                </a>
                <a href = "{{URL('admin/passwords/archives')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                    Archives
                </a>
            </div>
            <div class="px-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border rounded-tl-none overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                
                                <form class = "flex relative rounded-lg gap-1" action="{{URL('admin/passwords')}}" method="GET">
                                    @csrf
                                    <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" 
                                    type = "text" 
                                    placeholder = "Search User Here..."
                                    name="search"
                                    value = "{{request()->search}}"
                                    >
                                    <input type="submit" value="Search" class="text-xs mr-5 bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                    
                                    <span class = "text-sm text-gray-400 font-semibold h-full flex items-center justify-center">Filters:</span>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "campus">
                                        <option value = "">--Campus-- </option>
                                        <option value = "MA" {{request()->campus == "MA" ? 'selected' : ''}}> Malolos </option>
                                        <option value = "OB" {{request()->campus == "OB" ? 'selected' : ''}}> Obando </option>
                                        <option value = "PA" {{request()->campus == "PA" ? 'selected' : ''}}> Pandi </option>
                                        <option value = "SJ" {{request()->campus == "SJ" ? 'selected' : ''}}> San Jose </option>
                                        <option value = "SM" {{request()->campus == "SM" ? 'selected' : ''}}> San Miguel </option>
                                        <option value = "BO" {{request()->campus == "BO" ? 'selected' : ''}}> Bocaue </option>
                                        <option value = "SR" {{request()->campus == "SR" ? 'selected' : ''}}> San Rafael </option>
                                        <option value = "AN" {{request()->campus == "AN" ? 'selected' : ''}}> Angat </option>
                                    </select>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "status">
                                        <option value = "">--Status--</option>
                                        <option value = "Password Reset Success" {{request()->status == "Password Reset Success" ? 'selected' : ''}}>Success</option>
                                        <option value = "rejected" {{request()->status == "rejected" ? 'selected' : ''}}>Rejected</option>
                                        <option value = "pending" {{request()->status == "pending" ? 'selected' : ''}}>Pending</option>
                                    </select>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "rows">
                                        <option value = "">--Rows--</option>
                                        <option value = "8" {{request()->rows == "8" ? 'selected' : ''}}>8</option>
                                        <option value = "15" {{request()->rows == "15" ? 'selected' : ''}}>15</option>
                                        <option value = "30" {{request()->rows == "30" ? 'selected' : ''}}>30</option>
                                        <option value = "50" {{request()->rows == "50" ? 'selected' : ''}}>50</option>
                                        <option value = "100" {{request()->rows == "100" ? 'selected' : ''}}>100</option>
                                        <option value = "150" {{request()->rows == "150" ? 'selected' : ''}}>150</option>
                                        <option value = "200" {{request()->rows == "200" ? 'selected' : ''}}>200</option>
                                        <option value = "250" {{request()->rows == "250" ? 'selected' : ''}}>250</option>
                                        <option value = "300" {{request()->rows == "300" ? 'selected' : ''}}>300</option>
                                        <option value = "350" {{request()->rows == "350" ? 'selected' : ''}}>350</option>
                                        <option value = "400" {{request()->rows == "400" ? 'selected' : ''}}>400</option>
                                        <option value = "450" {{request()->rows == "450" ? 'selected' : ''}}>450</option>
                                        <option value = "500" {{request()->rows == "500" ? 'selected' : ''}}>500</option>
                                        <option value = "600" {{request()->rows == "600" ? 'selected' : ''}}>600</option>
                                        <option value = "700" {{request()->rows == "700" ? 'selected' : ''}}>700</option>
                                        <option value = "800" {{request()->rows == "800" ? 'selected' : ''}}>800</option>
                                        <option value = "900" {{request()->rows == "900" ? 'selected' : ''}}>900</option>
                                        <option value = "1000" {{request()->rows == "1000" ? 'selected' : ''}}>1000</option>
                                        <option value = "2000" {{request()->rows == "2000" ? 'selected' : ''}}>2000</option>
                                        <option value = "3000" {{request()->rows == "3000" ? 'selected' : ''}}>3000</option>
                                        <option value = "4000" {{request()->rows == "4000" ? 'selected' : ''}}>4000</option>
                                        <option value = "5000" {{request()->rows == "5000" ? 'selected' : ''}}>5000</option>
                                        <option value = "9999999" {{request()->rows == "9999999" ? 'selected' : ''}}>All</option>
                                    </select>
                                    <input type="submit" value="Apply" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                </form>
                                
                            </div>

                            <table class="min-w-[900px] text-sm md:text-base overflow-auto w-full " id="main-table">
                                <thead class = "" id = "thead">
                                    <th class = "px-2 print:hidden"><input type="checkbox" id = "selectAll" onclick="selectAll(this)"></th>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Reason</th>
                                    <th>Proof of Identity</th>
                                    <th>Status</th>
                                    <th class = "w-40 print:hidden" id = "operations">Operations</th>
                                    <th class = "px-2 w-40 hidden print:hidden" id = "multiSelect">
                              
                                        <details class = "relative">
                                            <summary class = "flex justify-center z-0 cursor-pointer">
                                                <svg class = "w-4 h-4" 
                                                version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 489.8 489.8" style="enable-background:new 0 0 489.8 489.8;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M469.1,182.95h-38.2c-3.1-8.3-6.2-16.6-10.3-23.8l26.9-26.9c8.3-8.2,8.3-20.6,0-28.9l-60-60c-8.2-8.3-20.6-8.3-28.9,0
                                                        l-27.9,27.9c-7.2-3.1-15.5-6.2-22.7-9.3v-39.3c0-11.4-9.3-20.7-20.7-20.7h-84.8c-11.4,0-20.7,9.3-20.7,20.7v37.1
                                                        c-8.2,3.1-15.5,6.2-22.7,9.3l-27.9-27.9c-8.2-8.3-20.6-8.3-28.9,0l-60,60c-8.3,8.2-8.3,20.6,0,28.9l26.9,26.9
                                                        c-4.1,8.3-7.2,15.5-10.3,23.8H20.7c-11.4,0-20.7,9.3-20.7,20.7v84.8c0,11.4,9.3,20.7,20.7,20.7h35.1c3.1,8.3,6.2,16.5,10.3,24.8
                                                        l-25.8,25.8c-4.1,4.1-11.6,16.3,0,28.9l60,60c8.2,8.3,20.6,8.3,28.9,0l24.8-24.8c8.2,5.2,16.5,8.3,25.8,11.4v34.1
                                                        c0,11.4,9.3,20.7,20.7,20.7h84.8c11.4,0,20.7-9.3,19.7-18.5v-34.1c8.2-3.1,17.5-7.3,25.8-11.4l24.8,24.8c8.2,8.3,20.6,8.3,28.9,0
                                                        l60-60c8.3-8.2,8.3-20.6,0-28.9l-25.8-25.8c4.1-8.3,7.2-16.5,10.3-24.8h40.1c11.4,0,20.7-9.3,20.7-20.7v-84.8
                                                        C489.8,192.25,480.5,182.95,469.1,182.95z M445.6,266.75h-31c-9.3,0-17.5,6.2-19.6,15.5c-4.2,15.5-9.3,30-17.6,43.4
                                                        c-5.2,8.3-3.1,18.6,3.1,24.8l21.7,21.7l-31,31l-20.7-20.7c-6.2-7.2-16.5-8.3-24.8-3.1c-14.5,8.3-29,14.5-44.5,18.6
                                                        c-9.3,2-15.5,10.3-15.5,19.6v30h-44.5v-0.1h-1v-30c0-9.3-6.2-17.5-15.5-19.6c-15.6-4.1-31.1-10.3-44.5-18.6
                                                        c-8.3-5.2-18.6-3.1-24.8,3.1l-20.7,20.7l-31-31l21.7-21.7c6.2-7.2,8.3-16.5,3.1-24.8c-8.3-13.4-14.5-27.9-17.6-43.4
                                                        c-2-9.3-10.3-15.5-19.6-15.5h-31v-44.5h33.1c9.3,0,17.5-6.2,19.6-15.5c3.1-14.5,9.3-28,17.6-41.4c5.2-8.3,3.1-18.6-3.1-24.8
                                                        l-23.8-23.8l31-31l23.8,23.8c7.2,6.2,16.5,8.3,24.8,3.1c13.5-7.2,26.9-13.4,41.4-16.5c9.3-2,15.5-10.3,15.5-19.6v-34.1h44.5v35.2
                                                        c0,9.3,6.2,17.5,15.5,19.6c14.5,3.1,29,9.3,41.4,16.5c8.3,5.2,18.6,3.1,24.8-3.1l24.8-24.8l31,31l-23.8,23.8
                                                        c-7.2,6.2-8.3,16.5-3.1,24.8c7.3,12.5,13.5,26.9,17.6,41.4c2,9.3,10.3,15.5,19.6,15.5h33.1V266.75z"/>
                                                    <path d="M242.9,132.25c-62,0-112.7,50.7-112.7,112.7s50.7,112.7,112.7,112.7c62.1,0,112.7-50.7,112.7-112.7
                                                        S304.9,132.25,242.9,132.25z M242.9,317.35c-39.3,0-72.4-32.1-72.4-72.4c0-39.3,32.1-72.4,72.4-72.4c40.3,0,72.4,32.1,72.4,72.4
                                                        C315.3,284.25,282.2,317.35,242.9,317.35z"/>
                                                </g>
                                            </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                                </svg>
                                            </summary>
                                            <div class = "absolute ml-[-70px] md:ml-[-70px] mt-2 rounded-md w-[150px]
                                            shadow-md flex flex-col border bg-white z-[9]">
                                                <form method = "POST" action = "{{URL('admin/passwords/multiAccept')}}">
                                                    @csrf
                                                    <div class = "multiSelectInputs">
                                                        
                                                    </div>
                                                    <button type = "submit" class = "py-2 font-normal">Accept</button>
                                                </form>
                                                <form method = "POST" action = "{{URL('admin/passwords/multiReject')}}">
                                                    @csrf
                                                    <div class = "multiSelectInputs">
                                                        
                                                    </div>
                                                    <button type = "submit" class = "py-2 font-normal">Reject</button>
                                                </form>
                                                <form method = "POST" action = "{{URL('admin/passwords/multiArchive')}}">
                                                    @csrf
                                                    <div class = "multiSelectInputs">
                                                        
                                                    </div>
                                                    <button type = "submit" class = "py-2 font-normal">Archive</button>
                                                </form>
                                            </div>
                                        </details>
                                    </th>
      
                                </thead>
                                @if (count($requests) == 0)
                                    <tr class = "text-center max-h-[80vh]">
                                        <td colspan="6" class = "text-gray-500 font-medium text-lg">No records found</td>
                                    </tr>
                                @else
                                    @foreach($requests as $request)
                                    <tr class = "text-center max-h-[80vh]">
                                        <td class="print:hidden"><input type="checkbox" name = "selected" onclick="selectOne()" value = "{{$request->id}}"></td>
                                        <td>{{$request->username}}</td>
                                        <td>{{$users->where('studentID',$request->username)->first()->firstName}} {{$users->where('studentID',$request->username)->first()->lastName}}</td>
                                        <td>{{$request->reason}}</td>
                                        <td><a class="underline" href="{{URL('storage/'.$request->proof)}}" target="_blank">{{$request->username}}-proof</a></td>
                                        <td>{{$request->status}}</td>
                                        <td class="flex gap-1 justify-center print:hidden">
                                            @if ($request->status == 'pending')
                                                <form method = "POST" action = "{{URL('/admin/passwords/reset', ['id' => $request->id ,'studentID' => $request->username])}}" class="flex gap-1 justify-center">
                                                    @csrf
                                                    <button class="bg-greenBPC hover:bg-darkGreenBPC text-white p-2 rounded-md">Accept</button>
                                                </form>
                                                <form method = "POST" action = "{{URL('/admin/passwords/reject', ['id' => $request->id, 'studentID' => $request->username ])}}" class="flex gap-1 justify-center">
                                                    @csrf
                                                    <button class="bg-red-600 hover:bg-red-800 text-white p-2 rounded-md">Reject</button>
                                                </form>
                                                
                                            @elseif($request->status == 'Rejected')
                                                <form action="{{URL('admin/passwords/archive', ['PasswordReset' => $request->id])}}" method = "POST">
                                                    @csrf
                                                    <button class="bg-greenBPC hover:bg-darkGreenBPC text-white p-2 rounded-md">Archive</button>
                                                </form>
                                            @else
                                                <form action="{{URL('admin/passwords/archive', ['PasswordReset' => $request->id])}}" method = "POST">
                                                    @csrf
                                                    <button class="bg-greenBPC hover:bg-darkGreenBPC text-white p-2 rounded-md">Archive</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </table>
                            <div class = "">
                                {{$requests->links()}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    </div>
</x-adminLayout>