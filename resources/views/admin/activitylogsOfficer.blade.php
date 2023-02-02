<x-adminLayout :heading="$heading">
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #logsNav{
                background-color:#017106;
                color: white;
            }
            #logsNav > svg * {
                fill: white;
            }
            #logsNav:hover {
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
                <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Activity Logs</h5>
                <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
    
            </div>
        </div>
        <div class="px-6 pt-6 flex text-gray-500 font-semibold">
            <a href = "{{URL('admin/logs')}}"
            class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                Admin
            </a>
            <a href = ""
            class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                Officer
            </a>
        </div>
        <div class="px-6 2xl:container">
            <div class="grid gap-6 grid-cols-1">
    
                <div class="md:col-span-2 lg:col-span-1" >
                    <div class="h-full py-8 px-6 space-y-6 rounded-xl border rounded-tl-none overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                        <div class = "flex w-full justify-between min-w-[900px]">
                            
                            <form class = "flex relative rounded-lg gap-1" action="{{URL('admin/logs/officer')}}" method="GET">
                                @csrf
                                <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                rounded-lg focus:outline-none focus:border-gray-100" 
                                type = "text" 
                                placeholder = "Search Logs Here..."
                                name="search"
                                value = "{{request()->search}}"
                                >
                                <input type="submit" value="Search" class="text-xs mr-5 bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                
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
                                    <option value = "all" {{request()->rows == "all" ? 'selected' : ''}}>All</option>
                                </select>
                                <input type="submit" value="Apply" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                            </form>
                            
                        </div>
    
                        <table class="min-w-[900px] text-sm md:text-base overflow-auto w-full " id="main-table">
                            <thead class = "" id = "thead">
                                <th>Activity ID</th>
                                <th>Officer</th>
                                <th>Activity</th>
                                <th>Date</th>
                            </thead>
                            @if (count($logs) == 0)
                                <tr class = "text-center max-h-[80vh]">
                                    <td colspan="4" class = "text-gray-500 font-medium text-lg">No records found</td>
                                </tr>
                            @else
                                @foreach($logs as $log)
                                <tr class = "text-center max-h-[80vh]">
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->officer}}</td>
                                    <td>{{$log->activity}}</td>
                                    <td>{{$log->created_at}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                        <div class = "">
                            {{$logs->links()}}
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
    
    </div>
    
    
    
    </x-adminLayout>