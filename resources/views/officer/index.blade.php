<x-officerLayout :heading="$heading">
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

        <style>
            #ongoingElectionAv{
                background-color:#017106;
                color: white;
            }
            #ongoingElectionAv > svg * {
                fill: white;
            }
            #ongoingElectionAv:hover {
                color:white !important;
            }
            th, td {
                padding: 16px 0;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>

            <!-- head + hamburger -->
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                    <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Ongoing Elections</h5>
                    <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            @if(count($electionsOngoing) == 0)
                <div class = "w-full text-gray-600 font-medium text-center my-32">
                    There are no ongoing elections
                </div>
            @else
                <div class = "w-full px-6 my-2">
                    <select id = "electionOngoing" class = "border-gray-200 rounded-md shadow-md">
                        @foreach($electionsOngoing as $election)    
                            <option value = "{{$election->id}}">{{$election->title}}</option> 
                        @endforeach
                    </select>
                </div>

                <div id = "tally">
                </div>

                <script type='text/javascript'>
                    $(document).ready(function() {
                        var initId = $('#electionOngoing').val();
             
                        $('#electionOngoing').change(function (){
                            id = $(this).val();
                        });
                        loadTally();
                    });
                
                    var res = ""
                    function loadTally(){
                        id = $('#electionOngoing').val();
                        $.ajax({
                                url: '/officer/livetally/' + id,
                                type: 'get',
                                success: function(response){
                                    if (res != response) {
                                        $('#tally').html(response);
                               
                                    }
                                    res = response
                                    setTimeout(loadTally, 2000);
                                }
                        })
                        
                    }

                </script>
            @endif
    </div>
</x-officerLayout>