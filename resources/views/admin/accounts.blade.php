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
            @media print {
                body * {
                    visibility: hidden;
                }
                * {
                    margin: 0;
                }
                #main-table, #main-table *, #logo, #logo > *, #elections-report, #report-filters, #query, #envote, #author {
                    visibility: visible;
                }
                #main-table {
                    position: absolute;
                    top: 110px;
                    left: 0;
                    table-layout: fixed;
                    
                }
                #logo {
                    display: block;
                    position: absolute;
                    top: 20px;
                    left: 20px;
                    width: 3rem;
                }
                
                #elections-report {
                    display: block;
                    position: absolute;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    font-size: 2rem;
                    font-weight: bold;
                }
                #report-filters {
                    display: block;
                    position: absolute;
                    top: 80px;
                    left: 40px;
                    font-size: 1.2rem;
                }
                #query {
                    display: block;
                    position: absolute;
                    top: 110px;
                    left: 40px;
                    font-size: 1.2rem;
                }
                #envote {
                    display: block;
                    position: absolute;
                    top: 25px;
                    left: 70px;
                    font-size: 2rem;
                }
                #author {
                    display: block;
                    position: absolute;
                    font-size: 1rem;
                    top: 0;
                    right: 0;
                }
                
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
            <h2 class="text-2xl font-bold text-darkGreenBPC hidden" id="envote">ENVote</h2>
            <h1 class="hidden" id="elections-report">Users Report</h1>
            <h2 class="text-xl font-bold hidden" id="author">Admin: {{auth()->guard('admin')->user()->firstName ." ". auth()->guard('admin')->user()->lastName}}</h2>
            <h3 class="hidden" id="report-filters">Filters: &nbsp;&nbsp;&nbsp; Campus:&nbsp;{{request()->campus}} &nbsp;&nbsp;&nbsp; Status:&nbsp;{{request()->status}} &nbsp;&nbsp;&nbsp; Rows:&nbsp;{{request()->rows}}</h3>
            <h3 class="hidden" id="query">Search: &nbsp;&nbsp;&nbsp;{{request()->search}}</h3>
            <h3 class="hidden" id="date">Date: &nbsp;&nbsp;&nbsp;</h3>
            <button id="print-button" class="text-xs bg-greenBPC p-2 px-3 z-[500] flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer fixed bottom-0 right-0 translate-x-[-15px] translate-y-[-15px]">Generate Report</button>
            <script>
                const printButton = document.getElementById("print-button")
                printButton.addEventListener("click", () => {
                    window.print()
                })
            </script>
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
                <a href = ""
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                    Users
                </a>
                <a href = "{{URL('admin/students')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                    Students
                </a>
            </div>
            <div class="px-6 2xl:container">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border rounded-tl-none overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                <div class = "flex">
                                    <form class = "flex relative rounded-lg gap-1" method="GET" action="{{ URL('/admin/accounts') }}">
                                        @csrf
                                        <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                        rounded-lg focus:outline-none focus:border-gray-100" 
                                        type = "text"
                                        placeholder = "Search Users Here..."
                                        name="search"
                                        value = "{{request()->search}}"
                                        >
                                        <input type="submit" value="Search" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white  mr-5 hover:bg-darkGreenBPC rounded-md cursor-pointer">

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
                                        <input type="submit" value="Apply" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                    </form>
                                </div>
                                <button class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md" data-modal-toggle="createUserModal" id="openUserModal">
                                    <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                    <path style="fill:#ffffff;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                        s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                        /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                    </svg>
                                    Add User
                                </button>
                                <div id="createUserModal" data-modal-show="false" aria-hidden="true" class="bg-black/25 hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    
                                    <div class="relative w-full max-w-2xl px-4 h-auto">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                    Add User
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createUserModal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ URL('/admin/accounts/add') }}" method="POST" onsubmit="return validateAccountsForm(event)" id="addUserForm">
                                                @csrf
                                                <div class="p-6 py-2 min-h-[200px] space-y-1 flex flex-col">
                                                    <label class="flex flex-col gap-1">
                                                        <p>Student ID:</p>
                                                        <input type="text" name="studentID" placeholder="Enter student ID" value = "" class="addUserInput border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                        <p class="text-red-500 text-xs error-p"></p>
                                                        @error('studentID')
                                                        <p class="text-red-500 text-xs">{{$message}}</p>
                                                        {{-- <script>
                                                            document.getElementById("createUserModal").classList.remove("hidden")
                                                            document.getElementById("createUserModal").classList.add("flex")
                                                            setTimeout(() => {
                                                                document.getElementById("createUserModal").classList.add("hidden")
                                                            }, 2000);
                                                        </script> --}}
                                                        @enderror
                                                    </label>
                                                    <label class="flex flex-col gap-1">
                                                        <p>Password:</p>
                                                        <input type="password" name="password" placeholder="Enter password" value = "" class="addUserInput border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                        <p class="text-red-500 text-xs error-p"></p>
                                                    </label>
                                                </div>
                                            
                                                <!-- Modal footer -->
                                                <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-toggle="createUserModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                    <button type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add User</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <table class="min-w-[900px] text-sm md:text-base overflow-auto w-full " id="main-table">
                                <thead class = "" id = "thead">
                                    <th class = "px-2 print:hidden"><input type="checkbox" id = "selectAll" onclick="selectAll(this)"></th>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Program</th>
                                    <th>Year/Section</th>
                                    <th>Birthday</th>
                                    <th id = "operations" class = "w-24 print:hidden">Operations
                                    </th>
                                    <th class = "px-2 w-24 hidden print:hidden" id = "multiSelect">
                              
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
                                                <form method = "POST" action = "{{URL('admin/accounts/multiResetPassword')}}">
                                                    @csrf
                                                    <div class = "multiSelectInputs">
                                                        
                                                    </div>
                                                    <button type = "submit" class = "py-2 font-normal">Reset passwords</button>
                                                </form>
                                            </div>
                                        </details>
                                    </th>
                                </thead>
                                @if (count($users) == 0)
                                    <tr class = "text-center max-h-[80vh]">
                                        <td colspan="7" class = "text-gray-500 font-medium text-lg">
                                            No records found
                                        </td>
                                    </tr>
                                @else
                                    @foreach($users as $user)
                                        <tr class = "text-center max-h-[80vh]">
                                            <!-- This is an example modal -->
                                            <div class="max-w-2xl max-h-[80vh] mx-auto">
            
                                                <!-- Main modal -->
                                                <div id="default-modal{{$user->studentID}}" data-modal-show="false" aria-hidden="true" class="bg-black/25 hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                    <div class="relative w-full max-w-2xl max-h-[80vh] px-4 h-auto">
                                                        <!-- Modal content -->
                                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                    Student ID: {{$user->studentID}}
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal{{$user->studentID}}">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form class = "" action="{{ URL('/admin/accounts/editPassword') }}" method="POST">
                                                                @csrf
                                                                <div class="h-[150px] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                                    <label class="flex flex-col gap-1">
                                                                        <p>Edit password:</p>   
                                                                        <input type="password" name="editPass" placeholder="Enter new password" required minlength="8" value = "" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                        <input type="hidden" name="studentID" value="{{$user->studentID}}">
                                                                    </label>
                                                                    
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-toggle="default-modal{{$user->studentID}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                                    <button type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                                </div>
                                                            </form>
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td class="print:hidden"><input type="checkbox" name = "selected" onclick="selectOne()" value = "{{$user->userID}}"></td>
                                            <td class = "px-2">{{$user->studentID}}</td>
                                            <td class = "px-2">{{$user->firstName}} {{$user->lastName}}</td>
                                            <td class = "px-2">{{$user->program}}</td>
                                            <td class = "px-2">{{$user->yearLevel}} - {{$user->section}}</td>
                                            <td class = "px-2">{{$user->birthDate}}</td>
                                            <td class = "px-2 flex justify-center">
                                            </td>
                                            <td class = "px-2 print:hidden">
                                                <details class = "relative details">
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
                                                        <button class = "py-2" data-modal-toggle="default-modal{{$user->studentID}}">Edit password</button>
                                                        <button class = "py-2" onclick="this.nextElementSibling.submit()">Reset password</button>
                                                        <form class="hidden" method="POST" action="{{ URL('/admin/accounts/resetPassword') }}">
                                                            @csrf
                                                            <input type="hidden" name="studentID" value="{{$user->studentID}}">
                                                        </form>
                                                    </div>
                                                </details>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            <div class = "">
                             
                                {{$users->appends(array('_token' => request()->_token,'campus' => request()->campus ,'program' => request()->program, 'year' => request()->year,'rows' => request()->rows,'search' => request()->search))->links()}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>

        <script>
            
            const openUserModal = document.getElementById("openUserModal")
            const addUserForm = document.getElementById("addUserForm")
            const inputFieldsAdminAccounts = addUserForm.querySelectorAll('.addUserInput')
            function validateAccountsForm(e) {
            inputFieldsAdminAccounts.forEach(input => {
                if (input.value == "") {
                    input.nextElementSibling.innerHTML = "Field Required"
                    return (false, e.preventDefault())
                }
                else if (input.value.length < 8) {
                    input.nextElementSibling.innerHTML = "Field must be at least 8 characters"
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