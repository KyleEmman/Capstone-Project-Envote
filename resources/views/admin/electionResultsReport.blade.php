<x-adminLayout :heading="$heading">
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
            @media print {
                div, ul {
                    break-inside: avoid;
                  	page-break-inside: avoid;
                }
                body * {
                    visibility: hidden;
                }
                * {
                    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari 6 – 15.3, Edge */
                    color-adjust: exact !important;                 /* Firefox 48 – 96 */
                    print-color-adjust: exact !important;   
                    margin: 0;
                }
                body {
                    margin: 50mm 0 50mm 0;
                }
                #main-content, #main-content *, #logo, #logo > *, #envote, #elections-report, #turnout, #turnout *, #author {
                    visibility: visible;
                }
                #title-header {
                    display: none;
                }
                #main-content {
                    position: absolute;
                    top: 40px;
                    width: 100%;
                    border: none;
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    grid-template-rows: auto;
                    margin-top: 30px;
                    margin-bottom: 30px;
                 	overflow: visible;
                }
                #logo {
                    display: block;
                    position: absolute;
                    top: 20px;
                    left: 20px;
                    width: 3rem;
                    height: 3rem;
                }
                
                #envote {
                    display: block;
                    position: absolute;
                    top: 25px;
                    left: 70px;
                    font-size: 2rem;
                }
                #elections-report {
                  	text-align: center;
                    display: block;
                    position: absolute;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    font-size: 2rem;
                    font-weight: bold;
                }
              	#turnout {
					position: absolute;
                  	bottom: -300px;
                  	width: 100%;
                  	left: 50%;
                    transform: translateX(-50%);
                }
              	#canvases {
                  	margin: 0;
              		flex-direction: row;
                  	flex-wrap: nowrap;
              	}
                #author {
                    display: block;
                    position: absolute;
                    font-size: 1rem;
                    top: 0;
                    right: 0;
                }
                
                
            }
            @page {
                margin-top: 2cm;
                margin-bottom: 2cm;
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
        <h1 class="hidden" id="elections-report">{{$election->title}}</h1>
        <h2 class="text-2xl font-bold text-darkGreenBPC hidden" id="envote">ENVote</h2>
        <h2 class="text-xl font-bold hidden" id="author">Admin: {{auth()->guard('admin')->user()->firstName ." ". auth()->guard('admin')->user()->lastName}}</h2>
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
      
        <div class="flex flex-wrap py-8 px-6 m-6 rounded-xl border overflow-auto border-gray-200 bg-white " id="main-content">
          <h2 class="w-full text-center text-3xl my-3 font-bold text-darkGreenBPC" id="title-header">
                {{$election->title}}
            </h2>
          
          
          
            @foreach($election->positions()->get() as $position)
                <!-- Position -->
                    <div class="w-full md:w-[calc(50%-16px)]  md:ml-2 flex flex-col print:w-10/12">
                        <!-- position title -->
                        <div style = "background-image: url('{{asset('assets/img/Campus.jpg')}}')"
                        class="text-start md:mx-10 bg-cover bg-no-repeat bg-center
                        w-8/12 print:w-full rounded-tr-full rounded-l-[500px]
                        font-medium text-white text-xl print:text-sm overflow-hidden relative p-4">
                            <div class = "absolute w-full h-full bg-darkGreenBPC/90 top-0 left-0 z-[1]"></div>
                            <h2 class = "text-white relative z-10">
                                {{$position->title}}
                            </h2>
                        </div>
                        @if (count($position->candidates()->get()) == 0)
                        <ul class="md:px-10">
                
                            <li class = "my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                
                                <div class="flex items-center flex-col md:flex-row relative">
                                    <p class="font-bold text-center text-gray-600">No candidates found</p>
                                </div>
                            </li>
                            
                        </ul>
                        @else
                        @php
                            $counter = 0;
                            $totalVotes = count($position->voteinfos()->get());
                        @endphp
                            @foreach ($totalVotes ? $position->candidates()->orderBy('votes', 'DESC')->get(): $position->candidates()->orderBy('lastName', 'ASC')->get() as $candidate)
                                <!-- candidates container -->   
                                <ul class="md:px-10">
                
                                    <!-- candidate number 1 -->
                                    <li class = "bg-white shadow-md border border-gray-100 my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                                        <style>
                                            #POS-{{$position->id}}{{$candidate->id}}{
                                                width: {{(($totalVotes != 0 ? $candidate->votes/$totalVotes : 0)*100)}}%;
                                            }
                                            </style>
                                        <div class="flex items-center flex-col md:flex-row relative transition-all flex-wrap">
                                
                                            <h2 class = "absolute w-[75px] left-0 ml-[-20px] md:ml-[-65px]
                                            font-bold text-xl text-darkGreenBPC text-center">{{$totalVotes !=0 ? ordinal($counter += 1) : "--"}}
                                            </h2>
                                            <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 object-cover rounded-full md:ml-2">
                                            <div class="flex flex-col items-start ml-5 w-auto">
                                                <h2 class="pres-kun font-bold text-xl mt-3 md:mt-0 text-black/80">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName || strtolower($candidate->middleName) != "n/a" ? substr($candidate->middleName, 0, 1) . "." : "")}} ({{$candidate->party}})</h2>
                                                <h3 class=" text-darkGreenBPC font-bold text-2xl pb-2 mt-3 flex items-end">{{$candidate->votes}}
                                                    <p class = "font-normal ml-2 text-base text-gray-700">Votes</p>
                                                </h3>
                                                <div class="w-11/12 md:w-full h-[8px] rounded-full overflow-hidden bg-gray">
                                                    <div class="w-[0%] h-full bg-darkGreenBPC transition-all" id = "POS-{{$position->id}}{{$candidate->id}}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
            @endforeach
          
          @if(count($votes->where('election_id', $election->id)) != 0)
                                                                  
                                                                
                                                                @endif
          </div>
        </div>
    </div>

</x-adminLayout>