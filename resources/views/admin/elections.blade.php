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
            /* The switch - the box around the slider */
            .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 17px;
            }

            /* Hide default HTML checkbox */
            .switch input {
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* The slider */
            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
            border-radius: 34px;
            }

            .slider.round:before {
            border-radius: 50%;
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
            <h2 class="text-xl font-bold hidden" id="author">Admin: {{auth()->guard('admin')->user()->firstName ." ". auth()->guard('admin')->user()->lastName}}</h2>
            <h1 class="hidden" id="elections-report">Elections Report</h1>
            <h3 class="hidden" id="report-filters">Filters: &nbsp;&nbsp;&nbsp; Campus:&nbsp;{{request()->campus}} &nbsp;&nbsp;&nbsp; Status:&nbsp;{{request()->status}} &nbsp;&nbsp;&nbsp; Rows:&nbsp;{{request()->rows}}</h3>
            <h3 class="hidden" id="query">Search: &nbsp;&nbsp;&nbsp;{{request()->search}}</h3>
            <h3 class="hidden" id="date">Date: &nbsp;&nbsp;&nbsp;</h3>
            <button id="print-button" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer fixed bottom-0 right-0 translate-x-[-15px] translate-y-[-15px]">Generate Report</button>
            <script>
                const printButton = document.getElementById("print-button")
                printButton.addEventListener("click", () => {
                    window.print()
                })
            </script>
            
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">
                        Elections
                    </h5>
    
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
    
                </div>
            </div>
            
            {{-- tabs --}}
            <div class="px-6 pt-6 flex text-gray-500 font-semibold">
                <a href = ""
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-white">
                    Elections
                </a>
                <a href = "{{URL('admin/elections/archives')}}"
                class = "w-fit px-8 py-2 rounded-xl rounded-b-none border overflow-auto border-gray-200 bg-[#e8e8e8]">
                    Archives
                </a>
            </div>
            
            <div class="px-6 2xl:container" id = "electionsTable">
                <div class="grid gap-6 grid-cols-1">
    
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl rounded-tl-none border overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                            <div class = "flex w-full justify-between min-w-[900px]">
                                
                                <form class = "flex relative rounded-lg gap-1" method="GET" action="{{ URL('/admin/elections') }}">
                                    @csrf
                                    <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" 
                                    type = "text" 
                                    placeholder = "Search Elections Here..."
                                    name="search"
                                    value = "{{request()->search}}"
                                    >
                                    <input type="submit" value="Search" class="text-xs mr-5 bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer">
                                    
                                    <span class = "text-sm text-gray-400 font-semibold h-full flex items-center justify-center">Filters:</span>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "campus">
                                        <option value = "">--Campus-- </option>
                                        <option value = "Malolos" {{request()->campus == "Malolos" ? 'selected' : ''}}> Malolos </option>
                                        <option value = "Obando" {{request()->campus == "Obando" ? 'selected' : ''}}> Obando </option>
                                        <option value = "Pandi" {{request()->campus == "Pandi" ? 'selected' : ''}}> Pandi </option>
                                        <option value = "San Jose" {{request()->campus == "San Jose" ? 'selected' : ''}}> San Jose </option>
                                        <option value = "San Miguel" {{request()->campus == "San Miguel" ? 'selected' : ''}}> San Miguel </option>
                                        <option value = "Bocaue" {{request()->campus == "Bocaue" ? 'selected' : ''}}> Bocaue </option>
                                        <option value = "San Rafael" {{request()->campus == "San Rafael" ? 'selected' : ''}}> San Rafael </option>
                                        <option value = "Angat" {{request()->campus == "Angat" ? 'selected' : ''}}> Angat </option>
                                    </select>
                                    <select class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-sm shadow-black/[0.07]
                                    rounded-lg focus:outline-none focus:border-gray-100" name = "status">
                                        <option value = "">--Status-- </option>
                                        <option value = "openForFiling" {{request()->status == "openForFiling" ? 'selected' : ''}}> openForFiling </option>
                                        <option value = "Upcoming" {{request()->status == "Upcoming" ? 'selected' : ''}}> Upcoming </option>
                                        <option value = "Ongoing" {{request()->status == "Ongoing" ? 'selected' : ''}}> Ongoing </option>
                                        <option value = "Completed" {{request()->status == "Completed" ? 'selected' : ''}}> Completed </option>
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
                                
                                <div class = "flex">
                                    <a href = "{{URL('admin/elections/templates')}}" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md mr-2">
                                        <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 379.281 379.281" style="enable-background:new 0 0 379.281 379.281;" xml:space="preserve">
                                        <g>
                                            <path style="fill:#ffffff;" d="M339.641,0h-300c-5.514,0-10,4.486-10,10v359.281c0,5.514,4.486,10,10,10h300c5.514,0,10-4.486,10-10V10
                                                C349.641,4.486,345.154,0,339.641,0z M329.641,359.281h-280V96.557h280V359.281z"/>
                                            <path style="fill:#ffffff;" d="M89.641,175.641h200c2.762,0,5-2.239,5-5v-34c0-2.761-2.238-5-5-5h-200c-2.762,0-5,2.239-5,5v34
                                                C84.641,173.402,86.879,175.641,89.641,175.641z"/>
                                            <path style="fill:#ffffff;" d="M89.641,322.641h91c2.762,0,5-2.239,5-5v-95c0-2.761-2.238-5-5-5h-91c-2.762,0-5,2.239-5,5v95
                                                C84.641,320.402,86.879,322.641,89.641,322.641z"/>
                                            <path style="fill:#ffffff;" d="M289.641,217.641h-70c-2.762,0-5,2.239-5,5v29c0,2.761,2.238,5,5,5h70c2.762,0,5-2.239,5-5v-29
                                                C294.641,219.879,292.402,217.641,289.641,217.641z"/>
                                            <path style="fill:#ffffff;" d="M289.641,282.324h-70c-2.762,0-5,2.239-5,5v29c0,2.761,2.238,5,5,5h70c2.762,0,5-2.239,5-5v-29
                                                C294.641,284.563,292.402,282.324,289.641,282.324z"/>
                                        </g> <g></g> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                        </svg>
                                        Templates
                                    </a>
                                    <button class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md" data-modal-toggle="createElectionModal">
                                        <svg class = "w-3 h-3 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                        <path style="fill:#ffffff;" d="M37.059,16H26V4.941C26,2.224,23.718,0,21,0s-5,2.224-5,4.941V16H4.941C2.224,16,0,18.282,0,21
                                            s2.224,5,4.941,5H16v11.059C16,39.776,18.282,42,21,42s5-2.224,5-4.941V26h11.059C39.776,26,42,23.718,42,21S39.776,16,37.059,16z"
                                            /><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                        </svg>
                                        Initiate Election
                                    </button>
                                </div>
                            </div>
                            <!-- create election modal -->
                            <div class = "max-h-[80vh]">
                                <div class="max-w-2xl max-h-[80vh] mx-auto">
                                    <div id="createElectionModal" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-full md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                        
                                        <div class="relative w-full max-w-2xl px-4 h-auto">
                                            <!-- Modal content -->
                                            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                        Initiate an Election
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createElectionModal">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                    </button>
                                                </div>
        
                                                <!-- Modal body -->
                                                <form action= "{{ URL('admin/elections/store') }}" method = "POST" id="createElectionForm" onsubmit="return handleSubmitForm(event)">
                                                    @csrf
                                                    <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                        <label class="flex flex-col gap-1">
                                                            <p>Election Title:</p>
                                                            <input type="text" name="title" id="electionTitle" placeholder="Enter election title" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                            <p class="text-red-500 text-xs"></p>
                                                            @error('title')
                                                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                                            @enderror
                                                        </label>
                                                        <label class="flex flex-col gap-1">
                                                            <p>Campus:</p>
                                                            <select name="campus" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                <option value="Malolos">Malolos</option>
                                                                <option value="Obando">Obando</option>
                                                                <option value="Pandi">Pandi</option>
                                                                <option value="San Jose">San Jose</option>
                                                                <option value="San Miguel">San Miguel</option>
                                                                <option value="Bocaue">Bocaue</option>
                                                                <option value="San Rafael">San Rafael</option>
                                                                <option value="Angat">Angat</option>
                                                            </select>
                                                        </label>
    
                                                        <label class="flex flex-col gap-1">
                                                            <p>Election for:</p>
                                                            <span class = "flex items-center">
                                                                <span class = "flex h-full mr-3">
                                                                    <input type="radio" name="for" id = "shsRadio" value = "shs" class="border-1 my-auto border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0 mr-2"> 
                                                                    <label for = "shsRadio">
                                                                        Senior High School
                                                                    </label>
                                                                </span>
                                                                <span class = "flex h-full">
                                                                    <input type="radio" name="for" checked id = "collegeRadio" value = "college" class="border-1 my-auto border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0 mr-2"> 
                                                                    <label for = "collegeRadio">
                                                                        College
                                                                    </label>
                                                                </span>
                                                            </span>
                                                        </label>
                                                        <label class="flex flex-col gap-1">
                                                            <p>Election Status:</p>
                                                            <select name="status" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                <option value="openForFiling">Open for Filing of Candidacy</option>
                                                                <option value="Upcoming">Upcoming</option>
                                                            </select>
                                                        </label>
                                                        <label class="flex flex-col gap-1">
                                                            <p>Position Template:</p>
                                                            <select name="template" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                @if(count($templates) == 0)
                                                                    <option disabled selected>No templates found</option>
                                                                @else
                                                                    @foreach($templates as $template)
                                                                        <option value="{{$template->id}}">{{$template->title}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </label>

                                                        </span>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-toggle="createElectionModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                        <input type="submit" id = 'submitElectionForm'class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Create Election"/>
                                                    </div>
                                                </form>
                                               
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
    
                            <table class="min-w-[900px] text-sm md:text-base overflow-auto w-full" id="main-table">
                                <thead class = "">
                                    <th>Election ID</th>
                                    <th>Name</th>
                                    <th>Campus</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Total Voters</th>
                                    <th>Off/On</th>
                                    <th>Type</th>
                                    <th class = "print:hidden">Operations</th>
      
                                </thead>

                                @if(count($elections) == 0)
                                    <tr class = "text-center max-h-[80vh]">
                                        <td colspan="7" class = "text-gray-500 font-medium text-lg">No records found</td>
                                    </tr>
                                @else
                                    @php
                                        function ordinal($number) {
                                            $ends = array('th','st','nd','rd','th','th','th','th','th','th');
                                            if ((($number % 100) >= 11) && (($number%100) <= 13))
                                                return $number. 'th';
                                            else
                                                return $number. $ends[$number % 10];
                                        }
                                    @endphp
                                    <script>
                                        function donutChart(element, labelSet, dataSet, titleName){
                                        
                                        const dataDoughnut = {
                                            labels: labelSet,
                                            datasets: [
                                            {
                                                label: "My First Dataset",
                                                data: dataSet,
                                                backgroundColor: [
                                                "#017106",
                                                "#e2cb00",
                                                ],
                                                hoverOffset: 2,
                                            },
                                            ],
                                        };
                                        const configDoughnut = {
                                            type: "doughnut",
                                            data: dataDoughnut,
                                            options: {
                                                plugins:{
                                                    legend:{
                                                    display: true,
                                                    position:'bottom',
                                                    labels:{
                                                        boxWidth: 20,
                                                        boxHeight: 7
                                                    }
                                                },
                                                title: {
                                                    display: true,
                                                    text: titleName,
                                                    align: 'start'
                                                }
                                            }
                                            },
                                        };
                        
                                        var chartBar = new Chart(
                                            document.getElementById(element),
                                            configDoughnut
                                        );
                                        }   
                                        function chartBar(element, subjects){
                                            const dataDoughnut = {
                                            labels: subjects,
                                            datasets: [
                                            {
                                                label: "My First Dataset",
                                                data: dataSet,
                                                backgroundColor: [
                                                "#FF829F",
                                                "#182747",
                                                "#9F9201",
                                                "#432626",
                                                "#F7D8F7",
                                                "#00FFD1",
                                                "#31C6D4",
                                                "#FFFF00",
                                                "#5C2E7E",
                                                "#FFABE1",
                                                "#674747"
                                                ],
                                                hoverOffset: 2,
                                            },
                                            ],
                                        };
                                        
                                        const configDoughnut = {
                                            type: "doughnut",
                                            data: dataDoughnut,
                                            options: {
                                                plugins:{
                                                    legend:{
                                                        display: true,
                                                        position:'bottom',
                                                        labels:{
                                                            boxWidth: 20,
                                                            boxHeight: 7
                                                        }
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'Voted per department',
                                                        align: 'start',
                                                    }
                                                }
                                            },
                                        };
                                        
                                        var chartBar = new Chart(
                                            document.getElementById(element),
                                            configDoughnut
                                        );
                                        
                                        }
                                    </script>
                                    @foreach($elections as $election)
                                        <tr class = "text-center max-h-[80vh]">
                                            <!-- Edit Modal -->
                                            <div class="max-w-2xl max-h-[80vh] mx-auto">
                                                <!-- Main modal -->
                                                <div id="default-modal{{$election->id}}" data-modal-show="false" aria-hidden="true" class="bg-black/25 hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                    <div class="relative w-full max-w-2xl max-h-[80vh] px-4 h-full md:h-auto">
                                                        <!-- Modal content -->
                                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                    Election ID: {{$election->id}}
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal{{$election->id}}">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form class = "" method="POST" action="{{URL('admin/elections/editElection')}}" id="editElectionForm">
                                                                @csrf
                                                                <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                                    <label class="flex flex-col gap-1">
                                                                        <p>Election Title:</p>   
                                                                        <input type="text" id="editElectionTitle" name="electionTitle" placeholder="Edit election title" value = "{{$election->title}}" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                        <input type="hidden" name="electionID" value="{{$election->id}}">
                                                                    </label>
                                                                    <label class="hidden">
                                                                        <select hidden name="electionCampus" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                            <option value="Malolos">Malolos</option>
                                                                            <option value="Obando">Obando</option>
                                                                            <option value="Pandi">Pandi</option>
                                                                            <option value="SanJose">San Jose</option>
                                                                            <option value="Sanmiguel">San Miguel</option>
                                                                            <option value="Bocaue">Bocaue</option>
                                                                            <option value="Sanrafael">San Rafael</option>
                                                                            <option value="Angat">Angat</option>
                                                                        </select>
                                                                    </label>
                                                                    <label class="flex flex-col gap-1">
                                                                        <p>Election Status:</p>
                                                                        @if ($election->status == "Completed")
                                                                        <select name="electionStatus" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" disabled>
                                                                            <option selected>Completed</option>
                                                                        </select>
                                                                        @else
                                                                        <select name="electionStatus" class="border-1 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0">
                                                                            <option value="openForFiling" {{$election->status == "openForFiling" ? 'selected' : ''}}>Open for Filing of Candidacy</option>
                                                                            <option value="Upcoming" {{$election->status == "Upcoming" ? 'selected' : ''}}>Upcoming</option>
                                                                            <option value="Ongoing" {{$election->status == "Ongoing" ? 'selected' : ''}}>Ongoing</option>
                                                                        </select>
                                                                        @endif
                                                                        

                                                                    </label>
                                                                    <!-- edit positions -->
                                                                    <span class = "flex flex-col">
                                                                        <p>Edit Positions:</p>
                                                                        <span class = "flex flex-col">
      
                                                                            @foreach ($election->positions()->get() as $position)
                                                                                <span class = "flex relative items-center w-full">
                                                                                    <input type="text" name="positionName[{{$position->id}}]" placeholder="Enter position name" value = "{{$position->title}}" class="w-full border-1 pr-20 mb-2 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                                                                                </span>
                                                                            @endforeach
                                                                            
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-toggle="default-modal{{$election->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                                    <button type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- view election modal -->
                                            <div class = "max-h-[80vh]">
                                                <div class="max-w-2xl max-h-[80vh] mx-auto">
                                                    <div id="viewElectionModal{{$election->id}}" data-modal-show="false" aria-hidden="true" class="hidden bg-black/25 overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                                        
                                                        <div class="relative w-full max-w-2xl px-4 h-auto">
                                                            <!-- Modal content -->
                                                            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700" id="modal-content">
                                                                <!-- Modal header -->
                                                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                                        {{$election->title}} - {{$election->campus}}
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="viewElectionModal{{$election->id}}">
                                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                                    </button>
                                                                </div>
                                    
                                                                <!-- Modal body -->
                                                                <div class="h-[calc(100vh-300px)] min-h-[200px] overflow-auto p-6 space-y-6 flex flex-col gap-1">
                                                                @if(count($votes->where('election_id', $election->id)) != 0)
                                                                    <!-- voters turnout -->
                                                                    <h2 class="text-center text-2xl">Voter's Turnout</h2>
                                                                    <div class="bg-white shadow-md border border-gray-100 md:px-4 rounded-lg relative flex flex-col md:flex-row justify-center items-center flex-wrap">
                                                                        
                                                                        <div class = "flex w-[calc(100%-50px)] flex-col md:w-1/2">
                                                                            <canvas class="" id="chartTurnout{{$election->id}}"></canvas> 
                                                                        </div>
                                                                        <div class = "flex w-[calc(100%-50px)] md:w-1/2"> 
                                    
                                                                            <canvas class="" id="chartDepartment{{$election->id}}"></canvas>
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    @php
                                                                        $yearLevel = array();
                                                                        $department = array();
                                                                        foreach($votes->where('election_id', $election->id) as $vote){
                                                                            if(!in_array($vote->program, $department, true)){
                                                                                array_push($department, $vote->program);
                                                                            }
                                                                            if(!in_array($vote->yearLevel, $yearLevel, true)){
                                                                                array_push($yearLevel, $vote->yearLevel);
                                                                            }
                                                                        }
                                                                    @endphp

                                                                    <script>
                                                                        var yearLevels = [
                                                                            @foreach ($yearLevel as $yl)
                                                                                "{{$yl}} - Year Level",
                                                                            @endforeach
                                                                        ];
                                                                        var ydataSet = [
                                                                            @foreach($yearLevel as $yl)
                                                                                {{count($votes->where('election_id', $election->id)->where('yearLevel', $yl))}},
                                                                            @endforeach
                                                                        ];

                                                                        var departments = [
                                                                            @foreach ($department as $dep)
                                                                                "{{$dep}}",
                                                                            @endforeach
                                                                        ]
                                                                        dataSet = [
                                                                            @foreach ($department as $dep)
                                                                                {{count($votes->where('election_id', $election->id)->where('program', $dep))}},
                                                                            @endforeach
                                                                        ]
                                                                        donutChart('chartTurnout{{$election->id}}', yearLevels, ydataSet, "Total Voters: "+ {{count($votes->where('election_id', $election->id))}} )
                                                                        chartBar('chartDepartment{{$election->id}}', departments, dataSet)
                                                                    </script>
                                                                
                                                                @endif
                                                                    @foreach($election->positions()->get() as $position)
                                                                        <!-- Position -->
                                                                        <h2 class="text-center text-2xl">{{$position->title}}</h2>
                                                                        @if(count($position->candidates()->get()) == 0)
                                                                            <div class = "w-full text-center"> No candidates found</div>
                                                                        @else
                                                                        @php
                                                                            $counter = 0
                                                                        @endphp
                                                                            @foreach($position->candidates()->get() as $candidate)
                                                                                <div class = "bg-white shadow-md border border-gray-100 hover:bg-gray-100 my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                                                                                    <div class="flex items-center flex-col md:flex-row relative flex-wrap">
                                                                                        <h2 class = "absolute w-[75px] left-0 ml-[-20px] md:ml-[-65px]
                                                                                        font-bold text-xl text-darkGreenBPC text-center">{{count($position->voteinfos()->get()->where('position_id', $position->id)) != 0 ? ordinal($counter += 1) : "--"}}</h2>
                                                                                        <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 object-cover rounded-full md:ml-2">
                                                                                        <div class="flex flex-col items-start ml-5 w-auto">
                                                                                            <h2 class="pres-kun font-bold text-xl mt-3 md:mt-0 text-black/80">{{$candidate->lastName}}, {{$candidate->firstName}} {{substr($candidate->middleName, 0, 1)}}<br> <span class="text-sm">({{$candidate->party}})</span></h2>
                                                                                            <h3 class=" text-darkGreenBPC font-bold text-2xl pb-2 mt-3 flex items-end">{{$candidate->votes}}
                                                                                                <p class = "font-normal ml-2 text-base text-gray-700">Votes</p>
                                                                                            </h3>
                                                                                            <div class="w-11/12 md:w-full h-[8px] rounded-full overflow-hidden bg-gray">
                                                                                                <div class="w-[0%] h-full bg-darkGreenBPC" id = "P001"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                    
                                                                <!-- Modal footer -->
                                                                <div class="flex space-x-2 justify-between flex-wrap w-full items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <div>
                                                                        <form method="POST" action="{{URL('admin/elections/report')}}"> 
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$election->id}}">
                                                                            <button id="print-results" type="submit" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" >Print</button>
                                                                        </form>
                                                                    </div>
                                                                    <div>
                                                                        <form method="POST" action="{{URL('admin/elections/result/store', ['election'=> $election->id])}}">
                                                                            @csrf
                                                                            <button data-modal-toggle="viewElectionModal{{$election->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                                                                            @If ($election->status == 'Ongoing' || $election->status == 'Onhold')
                                                                            <button type="button" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" onclick="confirm(this)">
                                                                                Declare Winners
                                                                            </button>
                                                                            
                                                                            @elseif ($election->status == 'Completed')
                                                                            <a href = "{{URL('admin/elections/result/show', ['election' => $election->id])}}" class="text-white bg-greenBPC hover:bg-darkGreenBPC focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                                                                                View Winners
                                                                            </a>

                                                                            @else 
                                                                            @endif
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <td class = "px-2 print:w-[20px]">{{$election->id}}</td>
                                            <td class = "px-2 print:w-[20px]">{{$election->title}}</td>
                                            <td class = "px-2 print:w-[20px]">{{$election->campus}}</td>
                                            <td class = "px-2 print:w-[20px]">{{$election->status}}</td>
                                            <td class = "px-2 print:w-[20px]">{{$election->created_at}}</td>
                                            <td class = "px-2 print:w-[20px]">{{count($votes->where('election_id', $election->id))}}</td>
                                            <td class = "px-2 print:w-[20px]">
                                                @if ($election->status == 'Ongoing' || $election->status == 'Onhold')
                                                    <label class="switch">
                                                        <form method="POST" action="{{URL('admin/elections/toggle', ['election' => $election->id])}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name = "toggler" type="checkbox" {{$election->status == "Onhold" || $election->status == "Ongoing" ? '' : 'disabled'}} {{$election->status == "Ongoing" ? 'checked' : ''}} onchange="this.closest('form').submit()">
                                                            <span class="slider round h"></span>
                                                        </form>
                                                    </label>
                                                @else
                                                    -- --
                                                @endif
                                            </td>
                                            <td>
                                                @if ($election->for == "shs")
                                                Senior High
                                                @else
                                                College
                                                @endif
                                            </td>
                                            <td class = "px-2 print:hidden">
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
                                                    <div class = "absolute ml-[-50px] md:ml-[-50px] mt-2 rounded-md w-[150px]
                                                    shadow-md flex flex-col border bg-white z-[9]">
                                                        <button class = "py-2" data-modal-toggle="default-modal{{$election->id}}">Edit</button>
                                                        <form action = "{{URL('admin/elections/archive', ['election' => $election->id])}}" method = "POST">
                                                            @csrf
                                                            <button class = "py-2">
                                                                Archive
                                                            </button>
                                                        </form>
                                                        <button class = "py-2" data-modal-toggle="viewElectionModal{{$election->id}}">Results</button>
                                                    </div>
                                                </details>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                @endif
                            </table>
                            <div class = "">
                                {{$elections->appends(array('_token' => request()->_token ,'search' => request()->search))->links()}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>

    </div>
        <style>
            .small {
                font-size: 16px;
            }
        </style>
        <script>
            const electionForm = document.getElementById("createElectionForm")
            const titleField = electionForm.querySelector("#electionTitle")
            function handleSubmitForm(e) {
                const positions = electionForm.querySelectorAll(".positionField")
                const posArr = Array.from(positions)
                if (titleField.value == "") {
                    titleField.nextElementSibling.innerText = "Field Required"
                    return false
                }
                else if (titleField.value.length < 8) {
                    titleField.nextElementSibling.innerText = "Field must be at least 8 characters"
                    return false
                }
              
                $.ajax({
                    url: "{{ URL('admin/elections/store') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: {
                        title: titleField.value,
                        positionName: posArr.map(position => {
                            return position.value
                        })
                    }
                }).done((res) => {
            
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Error: " + textStatus);
                })
            }
            function confirm(button) {
                let div = button.parentElement
                let form = div.querySelector('form')
                Swal.fire({
                    title: 'Are you sure you want to declare the winners for this election?',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    confirmButtonColor: '#017106',
                    reverseButtons: true,
                    customClass: {
                        title: 'small'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            }

        </script>
        
</x-adminLayout>
