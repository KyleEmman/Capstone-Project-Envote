<x-adminLayout :heading="$heading">

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #accountsNav{
                background-color:#017106;
                color: white;
            }
            #accountsNav > svg * {
                fill: white;
            }
            #accountsNav:hover {
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
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Users</h5>
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
            <div class="px-6 pt-6 flex text-gray-500 font-semibold">
                <a href = "{{URL('admin/accounts')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                    Users
                </a>
                <a href = ""
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                    Students
                </a>
            </div>
            <div class="px-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border rounded-tl-none overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                
                                <form class = "flex relative rounded-lg gap-1" method="GET" action="{{ URL('/admin/students') }}">
                                    @csrf
                                    <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" 
                                    type = "text" 
                                    placeholder = "Search Users Here..."
                                    name="search"
                                    value = "{{request()->search}}"
                                    >
                                    <input type="submit" value="Search" class="text-xs bg-greenBPC mr-5 p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">

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
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "program">
                                        <option value = "">--Program--</option>
                                        <option value = "COMSEC" {{request()->program == "COMSEC" ? 'selected' : ''}}>COMSEC</option>
                                        <option value = "HRS" {{request()->program == "HRS" ? 'selected' : ''}}>HRS</option>
                                        <option value = "CCM" {{request()->program == "CCM" ? 'selected' : ''}}>CCM</option>
                                        <option value = "CIT" {{request()->program == "CIT" ? 'selected' : ''}}>CIT</option>
                                        <option value = "BSOM" {{request()->program == "BSOM" ? 'selected' : ''}}>BSOM</option>
                                        <option value = "BSIS" {{request()->program == "BSIS" ? 'selected' : ''}}>BSIS</option>
                                        <option value = "BSAIS" {{request()->program == "BSAIS" ? 'selected' : ''}}>BSAIS</option>
                                        <option value = "BTVTED" {{request()->program == "BTVTED" ? 'selected' : ''}}>BTVTED</option>
                                        <option value = "CCS" {{request()->program == "CCS" ? 'selected' : ''}}>CCS</option>
                                        <option value = "DTS" {{request()->program == "DTS" ? 'selected' : ''}}>DTS</option>
                                        <option value = "ACT" {{request()->program == "ACT" ? 'selected' : ''}}>ACT</option>
                                    </select>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "year">
                                        <option value = "">--Year--</option>
                                        <option value = "1" {{request()->year == "1" ? 'selected' : ''}}>1st Year</option>
                                        <option value = "2" {{request()->year == "2" ? 'selected' : ''}}>2nd Year</option>
                                        <option value = "3" {{request()->year == "3" ? 'selected' : ''}}>3rd Year</option>
                                        <option value = "4" {{request()->year == "4" ? 'selected' : ''}}>4th Year</option>
                                        <option value = "11" {{request()->year == "11" ? 'selected' : ''}}>Grade 11</option>
                                        <option value = "12" {{request()->year == "12" ? 'selected' : ''}}>Grade 12</option>
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
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "q">
                                        <option>All</option>
                                        <option value = "users" {{request()->q == 'users' ? 'selected' : ''}}>Users</option>
                                        <option value = "non" {{request()->q == 'non' ? 'selected' : ''}}>Non-users</option>
                                    </select>
                                    <input type="submit" value="Apply" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                </form>
                                
                            </div>
                            <table class="min-w-[900px] text-sm md:text-base overflow-auto w-full ">
                                <thead class = "">
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Program</th>
                                    <th>Year/Section</th>
                                    <th>Birthday</th>
                                </thead>
                                @if (count($students) == 0)
                                    <tr class = "text-center max-h-[80vh]">
                                        <td colspan="7" class = "text-gray-500 font-medium text-lg">
                                            No records found
                                        </td>
                                    </tr>
                                @else
                                    @foreach($students as $student)
                                        <tr class = "text-center max-h-[80vh]">

                                            <td class = "px-2">{{$student->studentID}}</td>
                                            <td class = "px-2">{{$student->firstName}} {{$student->lastName}}</td>
                                            <td class = "px-2">{{$student->program}}</td>
                                            <td class = "px-2">{{$student->yearLevel}} - {{$student->section}}</td>
                                            <td class = "px-2">{{$student->birthDate}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            <div class = "">
                                {{$students->appends(array('_token' => request()->_token ,'search' => request()->search, 'campus' => request()->campus, 'program' => request()->program, 'year' => request()->year, 'rows' => request()->rows))->links()}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>



    </x-adminLayout>