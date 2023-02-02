@php
    function ordinal($number) {
            $ends = array('th','st','nd','rd','th','th','th','th','th','th');
            if ((($number % 100) >= 11) && (($number%100) <= 13))
                return $number. 'th';
            else
                return $number. $ends[$number % 10];
    }
    
@endphp
<div class="px-6 2xl:container">
    <div class="grid gap-6 grid-cols-1">

            <div class="md:col-span-2 lg:col-span-1 flex flex-col md:flex-row" >
                <!-- white container1 -->
                <div class="w-full md:w-[calc(50%-16px)] md:mr-8 md:mt-0 space-y-6 rounded-xl border overflow-hidden border-gray-200 bg-white h-[calc(100vh-120px)]">
                    <!-- graphs -->
                    <div class = "w-full flex-col relative py-8">
                        <h1 class = "text-center text-lg font-medium text-white bg-greenBPC absolute right-0 left-0 top-0 h-[50px] flex items-center justify-center">
                            Voter's Turnout
                        </h1>
                        <div class="space-y-6 flex flex-col gap-1 mt-[18px] pt-4 px-6 overflow-auto h-[calc(100vh-202px)]">
                            @if (count($votes->where('election_id', $election->id)) == 0)
                                <div class = "text-center w-full text-gray-600 font-medium">
                                    No records yet
                                </div>
                            @else
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
                                OGETotalVoters(yearLevels,ydataSet)
                                OGEVotesPerDept(departments, dataSet)
                            </script>
                            <div class = "w-full xl:px-10 2xl:px-24">
                                <h1 class = "text-xs 2xl:text-base mb-5 font-medium text-gray-600">
                                    Total Votes: {{count($votes->where('election_id', $election->id))}}
                                </h1>
                                <canvas id = "totalVotesVoters"></canvas>
                            </div>
                            <div class = "w-full xl:px-10 2xl:px-24">
                                <h1 class = "text-xs 2xl:text-base my-5 font-medium text-gray-600">
                                    Votes per Department
                                </h1>
                                <canvas id = "totalVotesDepartment"></canvas>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- white container2 -->
                <div class="w-full md:w-[calc(50%-16px)] mt-6 md:mt-0 space-y-6 rounded-xl border overflow-hidden border-gray-200 bg-white h-[calc(100vh-120px)]">
                    <div class = "w-full flex-col relative py-8">
                        <h1 class = "text-center text-lg font-medium text-white bg-greenBPC absolute right-0 left-0 top-0 h-[50px] flex items-center justify-center">
                            Live Tally
                        </h1>
                        <div class="space-y-6 flex flex-col gap-1 mt-[18px] pt-4 px-6 overflow-auto h-[calc(100vh-202px)]">
                            @foreach ($election->positions()->get() as $position)
                            <h2 class="text-center font-medium text-gray-600 text-xl">{{$position->title}}</h2>
                                @if (count($position->candidates()->get()) == 0)
                                    <div class = "my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14 text-center text-gray-600 font-medium">
                                        No candidates found
                                    </div>
                                @else
                                @php
                                    $counter = 0;
                                    $totalVotes = count($position->voteinfos()->get());
                                @endphp
                                    @foreach ($totalVotes ? $position->candidates()->orderBy('votes', 'DESC')->get() : $position->candidates()->orderBy('lastName', 'ASC')->get() as $candidate)
                                        <div class = "bg-white shadow-md border border-gray-100 hover:bg-gray-100 my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                                            <style>
                                                #POS-{{$position->id}}{{$candidate->id}}{
                                                    width: {{(($totalVotes != 0 ? $candidate->votes/$totalVotes : 0)*100)}}%;
                                                }
                                            </style>
                                            <div class="flex items-center flex-col md:flex-row relative flex-wrap">
                                                <h2 class = "absolute w-[75px] left-0 ml-[-20px] md:ml-[-65px]
                                                font-bold text-xl text-darkGreenBPC text-center">{{$totalVotes !=0 ? ordinal($counter += 1) : "--"}}</h2>
                                                <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 rounded-full md:ml-2 object-cover">
                                                <div class="flex flex-col items-start ml-5 w-full belowImg"">
                                                    <h2 class="pres-kun font-bold text-xl mt-3 md:mt-0 text-black/80">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName || strtolower($candidate->middleName) != "n/a" ? substr($candidate->middleName, 0, 1) . "." : "")}}</h2>
                                                    <h3 class=" text-darkGreenBPC font-bold text-2xl pb-2 mt-3 flex items-end">{{$candidate->votes}}
                                                        <p class = "font-normal ml-2 text-base text-gray-700">Votes</p>
                                                    </h3>
                                                    <div class="w-11/12 md:w-full h-[8px] rounded-full overflow-hidden bg-gray-200">
                                                        <div class="w-[0%] h-full bg-darkGreenBPC" id = "POS-{{$position->id}}{{$candidate->id}}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
      <style>
      	@media only screen and (min-width: 768px) {
          .belowImg {
          	width: calc(100% - 7rem);
          }
    	}
      </style>
    </div>
</div>