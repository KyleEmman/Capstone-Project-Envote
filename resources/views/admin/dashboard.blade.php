<x-adminLayout :heading="$heading">
@php
$recentElections = $elections->whereBetween('created_at', [$carbon->now()->startOfWeek(), $carbon->now()->endOfWeek()])->count();
$recentVoters = $voters->whereBetween('created_at', [$carbon->now()->startOfWeek(), $carbon->now()->endOfWeek()])->count();
$recentCandidates = $candidates->whereBetween('created_at', [$carbon->now()->startOfWeek(), $carbon->now()->endOfWeek()])->count();
$unregisteredVoters = $students->count() - $voters->count();
function programCount($program, $candidates) {
    $count = $candidates->where('program', $program)->count();
    return $count;
}
@endphp
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <style>
            #dashboardNav{
                background-color:#017106;
                color: white;
            }
            #dashboardNav > svg > * {
                fill: white;
            }
            #dashboardNav:hover {
                color:white !important;
            }
        </style>
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Dashboard</h5>
                <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="md:col-span-2 lg:col-span-1" >
                    <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white flex flex-col items-center">
                        <h5 class="text-xl text-greenBPC">Students Data</h5>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {packages:['corechart']});
                            google.charts.setOnLoadCallback(drawChart1);
                            function drawChart1() {
                                var data = google.visualization.arrayToDataTable([
                                    ["Category", "Count", { role: "style" } ],
                                    ["Total students", parseInt("{{$students->count()}}"), "green"],
                                    ["Eligible voters", parseInt("{{$voters->count()}}"), "blue"],
                                    ["Candidates", parseInt("{{$candidates->count()}}"), "yellow"],
                                ]);
    
                                var view = new google.visualization.DataView(data);
                                view.setColumns([0, 1,
                                                { calc: "stringify",
                                                    sourceColumn: 1,
                                                    type: "string",
                                                    role: "annotation" },
                                                2]);
    
                                var options = {
                                    title: 'Students participation',
                                    bar: {groupWidth: "95%"},
                                    responsive: true,
                                    legend: { position: "none" },
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
                                chart.draw(view, options);
                            }
                            </script>

                        <div id='column-chart' class="h-full w-full"></div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Users registered this week:</h5>
                            <h5 class="text-green-500 flex items-end gap-1">
                                <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                </svg>
                                +{{$recentVoters}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">New candidates this week:</h5>
                            <h5 class="text-green-500 flex items-end gap-1">
                                <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                </svg>
                                +{{$recentCandidates}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Total unregistered students:</h5>
                            <h5 class="text-green-500 flex items-end gap-1">
                                <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                </svg>
                                +{{$unregisteredVoters}}
                            </h5>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white flex flex-col items-center gap-3">
                        <h5 class="text-xl text-greenBPC">Elections Data</h5>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script>
                            google.charts.load('current', {packages: ['corechart', 'bar']});
                            google.charts.setOnLoadCallback(drawChart2);

                            function drawChart2() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Status', 'Count',],
                                        ['Open for filing', parseInt('{{$elections->where("status", "openForFiling")->count()}}')],
                                        ['Ongoing', parseInt('{{$elections->where("status", "Ongoing")->count()}}')],
                                        ['Upcoming', parseInt('{{$elections->where("status", "Upcoming")->count()}}')],
                                        ['Completed', parseInt('{{$elections->where("status", "Completed")->count()}}')],
                                    ]);
                                    var options = {
                                        title: 'Number of elections per status',
                                        chartArea: {width: '50%'},
                                        hAxis: {
                                        minValue: 0
                                        },
                                        vAxis: {
                                        title: 'Election Status'
                                        }
                                    };
                                    var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
                                    chart.draw(data, options);
                                }
                        </script>
                        <div id="bar-chart" class="h-full w-full"></div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Elections created within this week:</h5>
                            <h5 class="text-green-500 flex items-end gap-1">
                                <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                </svg>
                                +{{$recentElections}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Total College Elections:</h5>
                            <h5 class="text-green-500">
                                {{$elections->where('for', 'college')->count()}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Total Senior High Elections:</h5>
                            <h5 class="text-green-500">
                                {{$elections->where('for', 'shs')->count()}}
                            </h5>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white flex flex-col items-center gap-3">
                        <h5 class="text-xl text-greenBPC">Overall Candidates Data</h5>  
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart3);
                        function drawChart3() {
                            var data = google.visualization.arrayToDataTable([
                            ['Program', 'Count'],
                            ['COMSEC', parseInt({{programCount('COMSEC', $candidates)}})],
                            ['HRS', parseInt({{programCount('HRS', $candidates)}})],
                            ['CCM', parseInt({{programCount('CCM', $candidates)}})],
                            ['CIT', parseInt({{programCount('CIT', $candidates)}})],
                            ['BSOM', parseInt({{programCount('BSOM', $candidates)}})],
                            ['BSIS', parseInt({{programCount('BSIS', $candidates)}})],
                            ['BSAIS', parseInt({{programCount('BSAIS', $candidates)}})],
                            ['BTVTED', parseInt({{programCount('BTVTED', $candidates)}})],
                            ['CCS', parseInt({{programCount('CCS', $candidates)}})],
                            ['DTS', parseInt({{programCount('DTS', $candidates)}})],
                            ['ACT', parseInt({{programCount('ACT', $candidates)}})],
                            ]);

                            var options = {
                            title: 'Number of candidates per program',
                            is3D: true,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="pie-chart" class = "w-full h-full"></div>

                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Approved applications:</h5>
                            <h5 class="text-green-500">
                                {{$candidates->count()}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Pending applications:</h5>
                            <h5 class="text-green-500">
                                {{$applications->where('status', 'pending')->count()}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Rejected applications:</h5>
                            <h5 class="text-green-500">
                                {{$applications->where('status', 'rejected')->count()}}
                            </h5>
                        </div>
                        <div class="flex justify-between w-full">
                            <h5 class="text-gray-500">Archived applications:</h5>
                            <h5 class="text-green-500">
                                {{$archivedApplications->count()}}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       $(window).resize(function(){
        drawChart1();
        drawChart2();
        drawChart3();
        }); 
    </script>
</x-adminLayout>