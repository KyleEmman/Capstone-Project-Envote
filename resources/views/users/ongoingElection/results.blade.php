@php
$campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
, 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
$idAlpha = substr(auth()->user()->studentID, 0, 2);
$forWhat = auth()->user()->yearLevel < 6 ? 'college' : 'shs';
$ongoing = $elections->where('status', 'Ongoing')->where('for', $forWhat)->where('campus', $campusDictionary[$idAlpha])->first();
$allPositions = "";
if ($ongoing){
    $allPositions = $positions->where('election_id', $ongoing->id)->all() ? $positions->where('election_id', $ongoing->id)->all() : null;
}
function ordinal($number) {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number. 'th';
        else
            return $number. $ends[$number % 10];
}

@endphp
@if ($ongoing)

<h2 class="w-full text-center text-3xl my-3 font-bold text-darkGreenBPC">
    {{$ongoing->title}}
</h2>
<div class = "w-full px-5 mt-[20px] flex flex-col flex-wrap md:flex-row">
@foreach ($allPositions as $position)
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
            @foreach ($totalVotes ? $position->candidates()->orderBy('votes', 'DESC')->get(): $position->candidates()->orderBy('lastName', 'ASC')->get() as $candidate)
                <!-- candidates container -->   
                <ul class="md:px-10">

                    <!-- candidate number 1 -->
                    <li onclick = "showProfileModal('{{$candidate->id}}')" class = "bg-white shadow-md border border-gray-100 cursor-pointer hover:bg-gray-100 my-6 md:pl-16 py-4 rounded-lg relative px-5 md:px-14">
                        <style>
                            #POS-{{$position->id}}{{$candidate->id}}{
                                width: {{(($totalVotes != 0 ? $candidate->votes/$totalVotes : 0)*100)}}%;
                            }
                            </style>
                        <div class="flex items-center flex-col md:flex-row relative transition-all flex-wrap">
                            <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" class="w-20 h-20 rounded-full md:ml-2 object-cover">
                            <div class="flex flex-col items-start ml-5 w-full belowImg">
                                <h2 class="pres-kun font-bold text-xl mt-3 md:mt-0 text-black/80">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName || strtolower($candidate->middleName) != "n/a" ? substr($candidate->middleName, 0, 1) . "." : "")}}</h2>
                                <h2 class="font-bold text-xl mt-3 md:mt-0 text-black/80">({{$candidate->party}})</h2>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
        @endif
    </div>
@endforeach
  
 
@if (count($votes->where('studentID', auth()->user()->studentID)->where('election_id', $ongoing->id)) == 0)
<!-- vote button -->
<a href="{{URL('voteNow')}}"
class="flex items-center p-3 px-5 bg-greenBPC md:text-xl transition-all hover:-translate-y-1 duration-500 rounded-full shadow-lg text-white fixed bottom-4 right-4 z-10 hover:bg-darkGreenBPC">
    <img class = "w-4 h-4 invert mr-2" src="{{asset('assets/icons/voteIcon.png')}}">
    Vote Now
</a>
@else

@endif
@else
<h2 class="w-full text-center text-xl my-20 font-base text-gray-600 font-bold">
    No Ongoing Election
</h2>
@endif
  
  <style>
      	@media only screen and (min-width: 768px) {
          .belowImg {
          	width: calc(100% - 7rem);
          }
    	}
      </style>

