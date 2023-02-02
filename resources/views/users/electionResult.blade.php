<x-default :heading="$heading">
    @php
        function ordinal($number) {
            $ends = array('th','st','nd','rd','th','th','th','th','th','th');
            if ((($number % 100) >= 11) && (($number%100) <= 13))
                return $number. 'th';
            else
                return $number. $ends[$number % 10];
        }
    @endphp
    <!-- background cover up to nav -->
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[200px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
    </section>
    <!-- candidate profiles -->
    <section class="mt-[20px] w-full flex flex-wrap gap-2 bg-white">
        <div class = "w-full bg-gray-100 py-3 mt-[-20px] mb-3 flex">
            <a class="mx-8 p-3 py-[10px] font-medium text-gray-700
            pr-10 w-auto text-sm shadow-black/[0.07] flex items-center"
            href="{{URL('/results')}}">
                <img class = "w-5 mr-2 opacity-75" src="../assets/icons/backgIcon.png" alt="">
                Back
            </a>

        </div>
        <h2 class="w-full text-center text-3xl my-3 font-bold text-darkGreenBPC">
            {{$election->title}}
        </h2>
        <div class = "w-full px-5 mt-[20px] flex flex-col flex-wrap md:flex-row">
            @foreach ($positions as $position)
                <!-- position -->
                <div class="w-full md:w-[calc(50%-16px)]  md:ml-2 flex flex-col">
                    <!-- position title -->
                    <div style = "background-image: url('{{asset('assets/img/Campus.jpg')}}')"
                    class="text-start md:mx-10 bg-cover bg-no-repeat bg-center
                    w-8/12 rounded-tr-full rounded-l-[500px]
                    font-medium text-white text-xl overflow-hidden relative p-4">
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
                        @foreach ($totalVotes ? $position->candidates()->orderBy('votes', 'DESC')->get() : $position->candidates()->orderBy('lastName', 'ASC')->get() as $candidate)

                            <!-- candidates container -->   
                            <ul class="md:px-10">
                                <!-- candidate number 1 -->
                                <li onclick = "showProfileModal('{{$candidate->id}}')" class = "bg-white shadow-md border border-gray-100 cursor-pointer hover:bg-gray-100 my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                                    <style>
                                        #POS-{{$position->id}}{{$candidate->id}}{
                                            width: {{(($totalVotes != 0 ? $candidate->votes/$totalVotes : 0)*100)}}%;
                                        }
                                    </style>
                                    <div class="flex items-center flex-col md:flex-row relative">
                                        <h2 class = "absolute w-[75px] left-0 ml-[-20px] md:ml-[-65px]
                                        font-bold text-xl text-darkGreenBPC text-center">{{$totalVotes !=0 ? ordinal($counter += 1) : "--"}}
                                        </h2>
                                        <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 rounded-full md:ml-2">
                                        <div class="flex flex-col items-start ml-5 w-full">
                                            <h2 class="pres-kun font-bold text-xl mt-3 md:mt-0 text-black/80">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName || strtolower($candidate->middleName) != "n/a" ? substr($candidate->middleName, 0, 1) . "." : "")}}</h2>
                                            <h3 class=" text-darkGreenBPC font-bold text-2xl pb-2 mt-3 flex items-end">{{$candidate->votes}}
                                                <p class = "font-normal ml-2 text-base text-gray-700">Votes</p>
                                            </h3>
                                            <div class="w-11/12 md:w-full h-[8px] rounded-full overflow-hidden bg-gray">
                                                <div class="w-[0%] h-full bg-darkGreenBPC" id = "POS-{{$position->id}}{{$candidate->id}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <div id="profileModal" class="bg-black/25 fixed top-0 left-0 bottom-0 right-0 z-50 flex justify-center items-center hidden">
    </div>
    <script>
        function showProfileModal(CID){
            document.querySelector("#profileModal").classList.remove('hidden');
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("profileModal").innerHTML = this.responseText;
            }
            xhttp.open("GET", "{{URL('/ongoing/showCandidateProfile')}}/" + CID, true);
            xhttp.send();
        }
        function closeModalProfile(){
            modal = document.querySelector('#profileModal');
            modal.firstChild.remove();
            modal.classList.add('hidden');
        }
    </script>
</x-default>