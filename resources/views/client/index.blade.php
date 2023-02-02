<x-default :heading="$heading">
<!-- hero section -->
    <section class = "w-full bg-gray-100" id="main-section">
        <div class="w-full mx-auto z-[-1]">
            <!-- change data-carousel into slide -->
            <div id="default-carousel" class = "relative" data-carousel = "static">

                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-[500px] md:h-[calc(100vh)] md:max-h-[800px] md:min-h-[600px]">

                    <!-- Item 1 -->
                    <!-- hide this item if filing of candidacy is not yet opened -->
                    @php
                        $isCollege = (int)auth()->user()->yearLevel < 6 ? 'college' : 'shs';
                        $campusDictionary = ['MA' => 'Malolos', 'OB' => 'Obando', 'PA' => 'Pandi', 'SJ' => 'San Jose', 'SM' => 'San Miguel'
                                                , 'BO' => 'Bocaue', 'SR' => 'San Rafael', 'AN' => 'Angat'];
                        $isFiling = count($elections->where('campus', $campusDictionary[substr(auth()->user()->studentID, 0, 2)])
                                                    ->where('status', 'openForFiling')
                                                    ->where('for', $isCollege));
                        $isOngoing = count($elections->where('campus', $campusDictionary[substr(auth()->user()->studentID, 0, 2)])
                                                    ->where('status', 'Ongoing')
                                                    ->where('for', $isCollege));
                        
                    @endphp

                    @if ($isFiling > 0)
                        <div style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg') }}');" 
                        class="hidden duration-700 ease-in-out bg-center bg-cover" data-carousel-item>

                            <!-- backdrop blur/background filter -->
                            <div class = "absolute top-0 left-0 h-full w-full bg-gradient-to-b from-black/70 via-black/20 to-transparent"></div>
                            <div class = "absolute top-0 left-0 h-full w-full bg-black/25"></div>
                            <!-- content -->
                            <div class = "absolute top-0 left-0 h-full w-full pt-[100px] px-20 flex">
                                <div class = "w-full flex flex-col items-center justify-center">
                                    <h2 class = "text-white font-bold sm:text-4xl
                                    text-2xl text-center md:text-5xl md:text-left sm:mb-10 mb-4">
                                        Filing of candidacy is now open!
                                    </h2>
                                    <a class = "text-white text-xs md:text-base xl:text-base
                                    font-white font-bold
                                    p-3 px-5 md:px-9 md:p-4 rounded-full bg-greenBPC hover:bg-darkGreenBPC transition-all hover:-translate-y-1 duration-500"
                                    href = "{{URL('fileCandidacy', [ 'election' => $elections->where('status', 'openForFiling')
                                                                                    ->where('campus', $campusDictionary[substr(auth()->user()->studentID, 0, 2)])
                                                                                    ->where('for', $isCollege)->first()])}}">
                                        File my COC
                                    </a>
                                </div>

                            </div>

                        </div>
                    @elseif ($isOngoing > 0)
                        <div style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg') }}');" 
                        class="hidden duration-700 ease-in-out bg-center bg-cover" data-carousel-item>

                            <!-- backdrop blur/background filter -->
                            <div class = "absolute top-0 left-0 h-full w-full bg-gradient-to-b from-black/70 via-black/20 to-transparent"></div>
                            <div class = "absolute top-0 left-0 h-full w-full bg-black/25"></div>
                            <!-- content -->
                            <div class = "absolute top-0 left-0 h-full w-full pt-[100px] px-20 flex">
                                <div class = "w-full flex flex-col items-center justify-center">
                                    <h2 class = "text-white font-bold sm:text-4xl
                                    text-2xl text-center md:text-5xl md:text-left sm:mb-10 mb-4">
                                        There's an election ongoing!
                                    </h2>
                                    <a class = "text-white text-xs md:text-base xl:text-base
                                    font-white font-bold
                                    p-3 px-5 md:px-9 md:p-4 rounded-full bg-greenBPC hover:bg-darkGreenBPC transition-all hover:-translate-y-1 duration-500"
                                    href = "{{URL('ongoing')}}">
                                        Check ongoing election
                                    </a>
                                </div>

                            </div>

                        </div>  
                    @else
                        <div style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg') }}');" 
                        class="hidden duration-700 ease-in-out bg-center bg-cover" data-carousel-item>

                            <!-- backdrop blur/background filter -->
                            <div class = "absolute top-0 left-0 h-full w-full bg-gradient-to-b from-black/70 via-black/20 to-transparent"></div>
                            <div class = "absolute top-0 left-0 h-full w-full bg-black/25"></div>
                            <!-- content -->
                            <div class = "absolute top-0 left-0 h-full w-full pt-[100px] px-20 flex">
                                <div class = "w-full flex flex-col items-center justify-center">
                                    <h2 class = "text-white font-bold sm:text-4xl
                                    text-2xl text-center md:text-5xl md:text-left sm:mb-10 mb-4">
                                        Check Past Election Results here
                                    </h2>
                                    <a class = "text-white text-xs md:text-base xl:text-base
                                    font-white font-bold
                                    p-3 px-5 md:px-9 md:p-4 rounded-full bg-greenBPC hover:bg-darkGreenBPC transition-all hover:-translate-y-1 duration-500"
                                    href = "{{URL('results')}}">
                                        See Results
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endif
                    <!-- Item 2 -->
                    <div style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg') }}');" 
                    class="hidden duration-700 ease-in-out bg-center bg-cover" data-carousel-item>

                        <!-- backdrop blur/background filter -->
                        <div class = "absolute top-0 left-0 h-full w-full bg-gradient-to-b from-black/70 via-black/20 to-transparent"></div>
                        <div class = "absolute top-0 left-0 h-full w-full bg-black/25"></div>
                        <!-- content -->
                        <div class = "absolute top-0 left-0 h-full w-full pt-[100px] px-20 flex">
                            <div class = "w-full flex flex-col items-center justify-center">
                                <h2 class = "text-white font-bold sm:text-4xl
                                text-2xl text-center md:text-5xl md:text-left sm:mb-10 mb-4">
                                    Need a guide for voting?
                                </h2>
                                <div>

                                    <button type="button" class = "text-white text-xs md:text-base xl:text-xl hidden
                                    font-white font-bold
                                    p-3 px-7 rounded-full bg-greenBPC hover:bg-darkGreenBPC transition-all hover:text-black  hover:-translate-y-1 duration-500"
                                    type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="1">
                                        How to Vote?
                                    </button>
                                    <!-- show this button instead, if the filing of candidacy is not yet opened -->
                                    <button type="button" class = "text-white text-xs md:text-base xl:text-xl hidden
                                    font-white font-bold
                                    p-3 px-7 rounded-full bg-greenBPC hover:bg-darkGreenBPC transition-all hover:text-black  hover:-translate-y-1 duration-500"
                                    type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="3">
                                        How to Vote?
                                    </button>
                                    <button type="button" class = "text-white text-xs md:text-base xl:text-xl
                                    font-white font-bold
                                    p-3 px-7 rounded-full bg-greenBPC hover:bg-darkGreenBPC hover:text-black transition-all hover:-translate-y-1 duration-500"
                                    type="button" aria-current="true" aria-label="Slide 3" data-carousel-slide-to="3">
                                        How to Vote?
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Item 3 -->
                    <div style = "background-image: url('{{ URL::asset('assets/img/Campus.jpg') }}');" 
                    class="hidden duration-700 ease-in-out bg-center bg-cover" data-carousel-item>

                        <!-- backdrop blur/background filter -->
                        <div class = "absolute top-0 left-0 h-full w-full bg-gradient-to-b from-black/70 via-black/20 to-transparent"></div>
                        <div class = "absolute top-0 left-0 h-full w-full bg-black/25"></div>
                        <!-- content -->
                        <div class = "absolute top-0 left-0 h-full w-full pt-[100px] px-8 md:px-20 flex">
                            <div class = "w-full flex flex-col items-center justify-center">
                                <h2 class = "text-white font-bold sm:text-4xl
                                text-2xl text-center md:text-5xl md:text-left sm:mb-10 mb-4">
                                    How to Vote?
                                </h2>
                                <div class = "flex flex-row flex-wrap w-full px-10">
                                    <div class = "flex flex-col flex-wrap w-1/2 justify-center items-center">
                                        <!-- step 1 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                1
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Login your Account
                                            </p>

                                        </div>
                                        <!-- step 2 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                2
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Navigate on Elections
                                            </p>

                                        </div>
                                        <!-- step 3 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                3
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Click on ongoing Elections
                                            </p>

                                        </div>
                                        <!-- step 4 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                4
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                You may browse candidates
                                            </p>

                                        </div>
                                    </div>
                                    <div class = "flex flex-col flex-wrap w-1/2 justify-center items-center pl-4 md:pl-0">
                                        <!-- step 5 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                5
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Click the vote button
                                            </p>

                                        </div>
                                        <!-- step 6 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                6
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Choose your Candidates
                                            </p>

                                        </div>
                                        <!-- step 7 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-orangeBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                7
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Confirm your candidates and Submit
                                            </p>

                                        </div>
                                        <!-- step 8 -->
                                        <div class = "text-white flex w-[100px] sm:w-[150px] md:w-[270px] relative border-l border-dotted  h-16 md:h-[80px]">

                                            <div class = "bg-greenBPC text-base md:text-lg w-7 h-7 md:h-10 md:w-10 absolute ml-[-16px] md:ml-[-20px] mt-[-7px]
                                            flex items-center justify-center rounded-full">
                                                <img class = "h-3 md:h-4" src = "../assets/icons/check-mark-svgrepo-com.svg">
                                            </div>
                                            <p class = "ml-4 md:ml-16 font-medium text-xs md:w-full sm:text-sm md:text-lg">
                                                Get your certificate and you're good to go!
                                            </p>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Slider controls -->
                <button type="button" class="flex absolute top-7 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none " data-carousel-prev>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-md sm:w-10 sm:h-10 bg-greenBPC dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 hover:bg-darkGreenBPC dark:group-focus:ring-gray-800/70 group-focus:outline-none transition-colors">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button" class="flex absolute top-7 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none " data-carousel-next>
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-md sm:w-10 sm:h-10 bg-greenBPC dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 hover:bg-darkGreenBPC dark:group-focus:ring-gray-800/70 group-focus:outline-none transition-colors">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
    <!-- announcement section -->
    <section class = "w-full bg-white flex flex-col" id = "annSection">
        <x-announcementList :announcements="$announcements" />
    </section>
    
    
</x-default>