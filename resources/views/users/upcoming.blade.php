<x-default :heading="$heading">
    @php
        $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
        , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
        $idAlpha = substr(auth()->user()->studentID, 0, 2);
        $forWhat = auth()->user()->yearLevel < 6 ? 'college' : 'shs';
        $upcoming = $elections->where('status', 'Upcoming')->where('for', $forWhat)->where('campus', $campusDictionary[$idAlpha])->get();
    @endphp
    <!-- background cover up to nav -->
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[300px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
        <div class = "w-full z-20 text-white flex justify-center relative">
            <h2 class = "text-white text-3xl font-medium">Upcoming Elections</h2>
        </div>  
    </section>

    <!-- election result cards -->
    <section class="mt-[20px]">

        <!-- search form -->
        <div class = "w-full bg-gray-100 py-3 mt-[-20px] mb-3 flex justify-center sm:justify-start">
            <form class = "mx-8 flex relative rounded-lg" method="GET" action="{{URL('/users/electionSearch')}}">
                <input class = "border border-gray-100 p-3 pr-10 w-auto text-xs shadow-md shadow-black/[0.07]
                rounded-lg focus:outline-none focus:border-gray-100" 
                type = "text"
                name= "search" 
                placeholder = "Search Elections Here...">   
                <button class = "absolute right-0 top-0 
                h-[42px] w-[42px] flex items-center justify-center" 
                type = "submit">
                    <svg class = "w-[14px] fill-gray-400"
                    version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve"><g><path d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,
                        14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,
                        2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,
                        2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,
                        1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,
                        90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,
                        5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007
                        ,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955
                        ,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,
                        39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,
                        11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,
                        11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,
                        11.21L50.004,11.21z"/></g></svg>
                </button>
            </form>
        </div>


        <!-- election cards container -->
        @if (count($upcoming) != 0)
            <div class = "w-full px-5 flex flex-col md:flex-row flex-wrap">
                
                <!-- specific card 1 -->
                @foreach ($upcoming as $election)
                    <a href = '{{URL('upcomingElection/' . $election->id)}}' class = "bg-white w-full p-4 electionCard rounded-xl shadow-md my-3 border border-gray-100 md:w-[calc(50%-16px)] md:mx-2" type="button" >
                        <div class = "flex items-center justify-between">
                            <!-- Elections title -->
                            <h3 class="text-start text-xl line-clamp-2 text-darkGreenBPC font-medium">
                                {{$election->title}}
                            </h3>   
                            <img class = "w-5 opacity-0 arrowRight" src = "../assets/icons/arrow-right.svg">
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <h2 class="w-full text-center text-xl my-20 font-base text-gray-600 font-bold">
                No Elections found
            </h2>
        @endif
    </section>
</x-default>