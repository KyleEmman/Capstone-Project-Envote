<x-default :heading="$heading">
    <!-- background cover up to nav -->
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[300px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
        <div class = "w-full z-20 text-white flex justify-center relative">
            <h2 class = "text-white text-3xl font-medium">Filing Of Candidacy</h2>
        </div>  
    </section>

    <section class="py-5 w-full flex justify-center">

        <div class="flex w-full mx-4 md:w-8/12 lg:w-6/12 content-center justify-center rounded-lg shadow-lg bg-white items-center">
            <div class="flex w-full justify-center items-center flex-wrap">
                @php
                    function isApplicant($applications, $election){
                        foreach($applications->where('studentID', auth()->user()->studentID) as $application){
                            foreach($election->positions()->get() as $position_id){
                                if($application->position_id == $position_id->id){
                                    return $position_id->id;
                                }
                            }
                        }
                        return false;
                    }
                    $position_id = isApplicant($applications, $election);
                @endphp
                @if (isApplicant($applications, $election))
                   <p class = "font-bold w-full text-center mt-10 text-xl">Thank you for your application as: {{$election->positions()->where('id',$position_id)->first()->title}}
                   </p>
                   <p class = "font-bold w-full text-center mb-10 text-xl">
                    Status: {{$applications->where('studentID', auth()->user()->studentID)
                                                ->where('position_id', $position_id)->first()->status}}
                    </p>
                @else
                <!-- Form -->
                <form class="mt-4 w-full flex flex-col m-auto px-3 sm:px-10 rounded-md" method="POST" action = "{{URL('/fileCandidacy/store')}}">
                    @csrf
                    <input type="hidden" name="electionID" value="{{$election->id}}">
                    <div class="mb-3 w-full">
                        <label for='position_id' class="mb-2 block text-xs font-semibold">Position</label>
                        <select name="position_id" id="position_id" class="block w-full rounded-lg border border-gray-200 shadow-md focus:border-greenBPC focus:outline-none focus:ring-1 focus:ring-greenBPC p5-1.5 text-gray-500">
                            @foreach ($election->positions()->get() as $position)
                                <option value="{{$position->id}}">{{$position->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 w-full">
                        <label class="mb-2 block text-xs font-semibold">Party</label>
                        <select name="party" class="block w-full rounded-lg border border-gray-200 shadow-md focus:border-greenBPC focus:outline-none focus:ring-1 focus:ring-greenBPC p5-1.5 text-gray-500">
                            @foreach($partyLists as $party)
                                <option value = "{{$party->partyName}}">{{$party->partyName}}</option>
                            @endforeach
                            <option value="Independent">Independent</option>
                        </select>
                    </div>
                    <div class="mb-3 w-full flex flex-col md:flex-row">
                        <a href = "{{URL('/')}}" class="block text-center w-full md:w-[calc(50%-16px)] md:mx-2 md:py-2 shadow-lg rounded-full mt-2 hover:-translate-y-1 duration-500 bg-orangeBPC text-white py-2 hover:bg-red-700 hover:cursor-pointer">Cancel</a>
                        <input type="submit" class="w-full md:w-[calc(50%-16px)] md:mx-2 md:py-2 shadow-lg rounded-full mt-2 hover:-translate-y-1 duration-500 bg-greenBPC text-white py-2 hover:bg-darkGreenBPC hover:cursor-pointer">
                    </div>
                </form>
                @endif

            </div>
        </div>

    </section>
</x-default>