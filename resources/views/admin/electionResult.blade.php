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
            @media print {
                body * {
                    visibility: hidden;
                }
                * {
                    margin: 0;
                }
                #main, #main *, #logo, #logo > *, #envote, #author, #assignatories1, #assignatories2, #assignatories3, #assignatories4 {
                    visibility: visible;
                }
                #main {
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
                #assignatories1 {
                    display: block;
                    position: absolute;
                    bottom: 100px;
                    left: 20px;
                }
                #assignatories2 {
                    display: block;
                    position: absolute;
                    bottom: 75px;
                    left: 20px;
                }
                #assignatories3 {
                    display: block;
                    position: absolute;
                    bottom: 50px;
                    left: 20px;
                }
                #assignatories4 {
                    display: block;
                    position: absolute;
                    bottom: 25px;
                    left: 20px;
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
        <h2 id="assignatories1" class="hidden text-2xl">Authorized By:</h2>
        <span id="assignatories2" class="hidden text-2xl">Dean of Student Affairs - Mrs. Marissa B. Mendoza </span>
        <span id="assignatories3" class="hidden text-2xl">SMIS Head - Doc Rosemarie Guirre </span>
        <span id="assignatories4" class="hidden text-2xl">SG President - Rocel B. Canlas</span>
    <h2 class="text-xl font-bold hidden" id="author">Admin: {{auth()->guard('admin')->user()->firstName ." ". auth()->guard('admin')->user()->lastName}}</h2>
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <button id="print-button" class="text-xs bg-greenBPC p-2 px-3 flex items-center text-white hover:bg-darkGreenBPC rounded-md cursor-pointer fixed bottom-0 right-0 translate-x-[-15px] translate-y-[-15px]">Generate Report</button>
        <script>
            const printButton = document.getElementById("print-button")
            printButton.addEventListener("click", () => {
                window.print()
            })
        </script>
        <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
            <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Election Winners</h5>
            <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
        
        <div class="px-6 2xl:container mt-12">
            <div class="md:col-span-2 lg:col-span-1" >
                <div class="h-full py-8 px-6 space-y-6 rounded-xl border overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                    <a href = "{{URL('admin/elections')}}" class = "border border-gray-100 text-center p-3 w-full text-xs shadow-sm shadow-black/[0.07]
                    rounded-lg focus:outline-none focus:border-gray-100">Back</a>
                    <div class = "flex w-full flex-wrap min-w-[900px]" id="main">
                        <h2 class = "text-darkGreenBPC w-full text-center mx-auto font-bold text-3xl">
                            Winners of {{$result->election->title}}
                        </h2>
                        <div class = "w-full">
                            <table class="mt-5  min-w-[900px] text-sm md:text-base overflow-auto w-full">
                                <thead class = "bg-gray-100">
                                    <th class = "text-start pl-6 rounded-tl-xl">Position</th>
                                    <th class = "text-start">Name</th>
                                    <th class = "text-start">Party</th>
                                    <th class = "text-start">Votes</th>
                                    <th class = "text-start rounded-tr-xl">Vote %</th>
                                </thead>
                                @foreach($result->winners()->get() as $winner)
                                    <tr>
                                        <td class = "text-start pl-6">{{$winner->positionTitle}}</td>
                                        <td class = "text-start">{{$winner->firstName ?? "NO WINNER FOR THIS POSITION"}} {{$winner->lastName ?? ''}}</td>
                                        <td class = "text-start">{{$winner->party ?? "--"}}</td>
                                        <td class = "text-start">{{$winner->voteCount ?? "--"}}</td>
                                        <td class = "text-start">{{$winner->firstName ? strval(($winner->voteCount/$votes)*100).'%' : '--'}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</x-adminLayout>