<x-default :heading="$heading">

    
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[200px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
    </section>

    <section class="w-auto px-4 md:px-20 flex flex-col bg-white">
        <h2 class="w-full text-center text-3xl my-3 font-bold text-darkGreenBPC px-4">{{$election->title}} - {{$election->campus}} Campus <br>e-Ballot</h2>
        <div class="">
            <form action="{{URL('/voteNow/confirm', ['election' => $election])}}" method = "POST" class="flex flex-col gap-1 mt-3 mb-8">
                @csrf
                @foreach($election->positions()->get() as $position)
                    <div class="flex flex-wrap justify-center">
                        <!-- position title -->
                        <div class = "w-full flex justify-center py-3">
                            <h2 class = "relative text-darkGreenBPC text-3xl md:text-4xl font-medium z-10">
                                {{$position->title}}
                            </h2>
                        </div>
                        
                        @if (count($position->candidates()->get()) == 0)
                            No candidate found
                        @else
                            
                            <div class = "w-full flex flex-wrap justify-center">
                            @foreach($position->candidates()->get() as $candidate)
                                <label class="rounded-lg flex flex-col shadow-md border overflow-hidden
                                w-[calc(50%-24px)] xl:w-[calc(33.33%-24px)] my-3 mx-3 bg-white hover:bg-gray-100 py-5 items-center relative">

                                    <div class = "w-full flex justify-center">
                                        <input type="radio" name="{{$position->id}}" value="{{$candidate->id}}" class="hidden">
                                        <div class="absolute top-0 bottom-0 right-0 left-0 gray-cover z-[3]"></div>

                                        <div class = "w-20 aspect-square shadow-md sm:w-32 z-[5]
                                        rounded-full overflow-hidden">
                                            <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('/assets/icons/userProfileIcon.png')}}" class="object-cover h-full w-full">
                                        </div>

                                    </div>
                                    <div class="grow flex flex-col md:flex-row md:items-end mt-3 justify-center items-start w-fit z-[5]">
                                        <p class="text-md sm:text-3xl font-black text-darkGreenBPC w-min md:w-fit">{{$candidate->lastName}}</p>
                                        <p class="text-2xl sm:text-3xl hidden md:block font-black text-darkGreenBPC w-fit">,&nbsp;</p>
                                        <p class="text-base md:text-lg md:font-normal text-darkGreenBPC w-min md:w-fit">{{$candidate->firstName}}&nbsp</p>
                                        <p class="text-xs md:text-lg md:font-normal text-darkGreenBPC w-fit">({{$candidate->party}})</p>
                                    </div>
                                </label>
                            @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class = "w-full flex flex-col-reverse md:flex-row items-center justify-center mt-5">

                    <a href = "{{URL('ongoing')}}" class = "bg-orangeBPC text-center text-white text-lg w-full md:w-3/12 md:mr-2 shadow-md hover:-translate-y-1 duration-500 hover:shadow-2xl hover:bg-red-700
                    font-medium rounded-full py-2">Cancel</a>

                    <input class = "bg-greenBPC text-white text-lg w-full md:w-3/12 my-2 md:my-0 shadow-md hover:-translate-y-1 duration-500 hover:shadow-2xl hover:bg-darkGreenBPC cursor-pointer
                    font-medium rounded-full py-2 " type = "submit" value="Submit Vote">

                </div>

            </form>

        </div>
        <div>

        </div>

 
        <div class="max-w-2xl max-h-[80vh] mx-auto">

            <div id="instructionsModal" data-modal-show="true" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        
                    <div class="bg-white rounded-lg overflow-auto shadow absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-[90vw] md:w-[700px] dark:bg-gray-700">
         
                        <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                Instructions
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="instructionsModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                  
                        <div class="w-full flex justify-center py-5 px-6 lg:px-10 max-h-[300px] overflow-auto">
                            <ul class="w-fit flex flex-col gap-1">
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 1:</p> <p class="text-sm">Select your desired candidates from president to the last position.</p></li>
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 2:</p> <p class="text-sm">You can see that you have selected a candidate by checking if the card's background turned to gray</p></li>
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 3:</p> <p class="text-sm">Click submit vote on the lower part of the page.</p></li>
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 4:</p> <p class="text-sm">Confirm if you have selected the right candidates.</p></li>
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 5:</p> <p class="text-sm">Click confirm on the lower part of the page.</p></li>
                                <li class="w-fit"><p class="text-gray-600 font-bold">Step 6:</p> <p class="text-sm">You will receive your certificate and you may print it by clicking the "View certificate" button</p></li>
                                <li class="w-fit pb-5"><p class="text-gray-600 font-bold">Step 7:</p> <p class="text-sm">Save your certificate as PDF.</p></li>
                            </ul>
                        </div>
                     
                        <div class="flex space-x-2 justify-end items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-toggle="instructionsModal" type="button" class="text-white bg-greenBPC hover:bg-darkGreenBPC transition-all focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">I understand</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <button data-modal-toggle="instructionsModal" class="hidden" id="showInstructionsButton"></button>
    </section>
    <script>
        $(document).ready(function(){
            $('#showInstructionsButton').trigger('click');
            const clearButtons = document.querySelectorAll('.clear-button')
            clearButtons.forEach(button => {
                button.addEventListener('click', () => {
                    let parent = button.parentElement
                    let radios = parent.querySelectorAll('input')
                    radios.forEach(radio => {
                        radio.checked = false
                    })
                })
            })

            $('input[type="radio"]').click(function(e) {

                let parent = this.parentElement.parentElement.parentElement
                let radios = parent.querySelectorAll('input')
                    radios.forEach(radio => {
                        if(!($(radio).prop('checked')) && $(radio).hasClass('checked')){
                            $(radio).removeClass('checked');
                        }
                        radio.checked = false
                    })
     
                if($(this).hasClass('checked')){
                    this.checked = false;
                    $(this).removeClass('checked')
                }
                else{
                    this.checked = true;
                    $(this).addClass('checked');
                }
           
            });
        });
    </script>

</x-default>