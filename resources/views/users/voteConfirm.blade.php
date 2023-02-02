<x-default :heading="$heading">
    <style>
        tr:nth-child(even) {
                background-color: #f2f2f2;
        }
    </style>
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[200px] bg-cover bg-center bg-no-repeat relative pt-[200px]">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
    </section>

    <section class="w-auto px-4 md:px-20 flex flex-col bg-white">
        <div class="">

            <!-- form for voting -->
            <form action="{{URL('/voteNow/confirm/e-certificate', ['election'=>$election])}}" method = "POST" class="flex flex-col gap-1 mt-3 mb-8">
                @csrf
                <input type="hidden" name="positions" value={{$positions}}>
                <input type="hidden" name="candidates" value={{$candidates}}>

                <div class = "w-full flex justify-center py-3">
                    <h2 class = "relative text-darkGreenBPC text-3xl md:text-4xl font-medium z-10">
                        Please confirm that you voted for the following candidates:
                    </h2>
                </div>
                <div class="flex flex-col md:flex-row md:flex-wrap items-center justify-center m-auto">
                    {{-- @foreach ($positions as $position)
                        <div class="flex flex-wrap">
                            <!-- position title -->
                            <div class = "w-full flex justify-center py-3">
                                <h2 class = "relative text-darkGreenBPC text-3xl md:text-4xl font-medium z-10">
                                    {{$position->title}}
                                </h2>
                            </div>
                            <div class = "w-full flex flex-wrap justify-center md:h-[120px]">
                                @if ($candidates->find($request[$position->id]))
                                <label class="rounded-lg flex shadow-md border
                                 my-3 mx-3 bg-white py-5 items-center w-[75%] px-3">
                                    <div class = "w-3/12 flex justify-center">
                                        <input type="hidden" name="{{$position->id}}" value="{{$candidates->find($request[$position->id])->id}}" class="hidden">
                                        <div class = "aspect-square shadow-md sm:w-14
                                        rounded-full overflow-hidden">
                                            <img src="{{$candidates->find($request[$position->id])->cprofile->displayPhoto ? asset('storage/'.$candidates->find($request[$position->id])->cprofile->displayPhoto) : asset('/assets/icons/userProfileIcon.png')}}" class="object-cover h-full w-full">
                                        </div>
                                    </div>
                                    <div class="w-full flex ml-3 justify-start items-center h-full">
                                        <p class="text-xl font-black text-darkGreenBPC w-min md:w-fit break-words">{{$candidates->find($request[$position->id])->lastName}}</p>
                                        <p class="text-xl hidden md:block font-black text-darkGreenBPC w-fit ">,&nbsp;</p>
                                        <p class="text-base md:text-lg md:font-normal text-darkGreenBPC w-min md:w-fit break-words">{{$candidates->find($request[$position->id])->firstName}}&nbsp</p>
                                        <p class="text-xs md:text-lg md:font-normal text-darkGreenBPC w-fit ">({{$candidates->find($request[$position->id])->party}})</p>
                                    </div>
                                </label>
                                @else
                                <label class="rounded-lg flex flex-col shadow-md border justify-center
                                 my-3 mx-3 bg-white py-5 items-center w-[75%] ">
                                    <div class="grow flex flex-col md:flex-row md:items-center justify-center items-start w-fit">
                                        <p class="text-xl md:text-xl sm:text-lg font-bold text-gray-500 text-darkGreenBPC w-min md:w-fit">No candidate voted</p>
                                    </div>
                                </label>
                                @endif
                            </div>
                        </div>
                    @endforeach --}}
                    <table class="text-sm md:text-base overflow-auto w-full min-h-[300px] md:min-w-[900px] " id="main-table">
                        <thead class="bg-gray-100">
                            <tr class="h-10">
                                <th>Position</th>
                                <th>Candidate</th>
                                <th>Party</th>
                                <th>Picture</th>
                            </tr>
                        </thead>
                        @foreach ($positions as $position)
                        <tr class="text-center">
                            <td>{{$position->title}}</td>
                            @if ($candidates->find($request[$position->id]))
                                <input type="hidden" name="{{$position->id}}" value="{{$candidates->find($request[$position->id])->id}}" class="hidden">
                                <td>{{$candidates->find($request[$position->id])->lastName . ", " . $candidates->find($request[$position->id])->firstName}}</td>
                                <td>{{$candidates->find($request[$position->id])->party}}</td>
                                <td class="">
                                    <div class = "aspect-square shadow-md w-10 flex m-auto
                                        rounded-full overflow-hidden">
                                        <img src="{{$candidates->find($request[$position->id])->cprofile->displayPhoto ? asset('storage/'.$candidates->find($request[$position->id])->cprofile->displayPhoto) : asset('/assets/icons/userProfileIcon.png')}}" class="object-cover h-full w-full">
                                    </div>
                                </td>
                            @else
                                <td>No candidate voted</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>

                <!-- buttons -->
                <div class = "w-full flex flex-col-reverse md:flex-row items-center justify-center mt-5">

                    <a href = "javascript:history.back()" class = "bg-orangeBPC text-center text-white text-lg w-full md:w-3/12 md:mr-2 shadow-md hover:-translate-y-1 duration-500 hover:shadow-2xl hover:bg-red-700
                    font-medium rounded-full py-2">Cancel</a>

                    <input class = "bg-greenBPC text-white text-lg w-full md:w-3/12 my-2 md:my-0 shadow-md hover:-translate-y-1 duration-500 hover:shadow-2xl hover:bg-darkGreenBPC cursor-pointer
                    font-medium rounded-full py-2 " type = "submit" value="Confirm">

                </div>
            </form>
        </div>
        <div>
        </div>
    </section>
</x-default>