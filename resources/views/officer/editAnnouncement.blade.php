<x-officerLayout :heading="$heading">
    <!-- contents -->
    @php
    @endphp
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="lg:px-6 flex items-center flex-row-reverse lg:flex-row justify-between space-x-4 2xl:container">
                <h5 class="text-2xl font-medium lg:block w-full text-center lg:w-fit text-greenBPC">Edit Announcement</h5>
                <button class="w-12 h-16 ml-[-24px] border-r lg:hidden" id = "hamburgerAdmin">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">
            <div class="grid gap-6 grid-cols-1">

                <div class="md:col-span-2 lg:col-span-1" >
                    <div class="h-full py-8 px-6 space-y-6 rounded-xl border overflow-auto border-gray-200 bg-white min-h-[calc(100vh-120px)]">
                        <form class="flex flex-col gap-2" enctype="multipart/form-data" method="POST" action="{{URL("/officer/editAnnouncementForm")}}">
                            @csrf
                            @if ($announcement->cover)
                                <img class = "rounded-md bg-center bg-cover h-36 sm:h-52 md:h-60 2xl:h-96 object-cover" src="{{asset('storage/'.$announcement->cover)}}"/>
                                @error('image')
                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                @enderror
                            @else
                                <svg class = "rounded-md bg-center bg-cover h-36 sm:h-52 md:h-60 2xl:h-96" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.19 123.38" style="enable-background:new 0 0 115.19 123.38" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;stroke:#000000;stroke-width:0.5;stroke-miterlimit:2.6131;}</style><g><path class="st0" d="M93.13,79.5c12.05,0,21.82,9.77,21.82,21.82c0,12.05-9.77,21.82-21.82,21.82c-12.05,0-21.82-9.77-21.82-21.82 C71.31,89.27,81.08,79.5,93.13,79.5L93.13,79.5z M8.08,0.25h95.28c2.17,0,4.11,0.89,5.53,2.3c1.42,1.42,2.3,3.39,2.3,5.53v70.01 c-2.46-1.91-5.24-3.44-8.25-4.48V9.98c0-0.43-0.16-0.79-0.46-1.05c-0.26-0.26-0.66-0.46-1.05-0.46H9.94 c-0.43,0-0.79,0.16-1.05,0.46C8.63,9.19,8.43,9.58,8.43,9.98v70.02h0.03l31.97-30.61c1.28-1.18,3.29-1.05,4.44,0.23 c0.03,0.03,0.03,0.07,0.07,0.07l26.88,31.8c-4.73,5.18-7.62,12.08-7.62,19.65c0,3.29,0.55,6.45,1.55,9.4H8.08 c-2.17,0-4.11-0.89-5.53-2.3s-2.3-3.39-2.3-5.53V8.08c0-2.17,0.89-4.11,2.3-5.53S5.94,0.25,8.08,0.25L8.08,0.25z M73.98,79.35 l3.71-22.79c0.3-1.71,1.91-2.9,3.62-2.6c0.66,0.1,1.25,0.43,1.71,0.86l17.1,17.97c-2.18-0.52-4.44-0.79-6.78-0.79 C85.91,71.99,79.13,74.77,73.98,79.35L73.98,79.35z M81.98,18.19c3.13,0,5.99,1.28,8.03,3.32c2.07,2.07,3.32,4.9,3.32,8.03 c0,3.13-1.28,5.99-3.32,8.03c-2.07,2.07-4.9,3.32-8.03,3.32c-3.13,0-5.99-1.28-8.03-3.32c-2.07-2.07-3.32-4.9-3.32-8.03 c0-3.13,1.28-5.99,3.32-8.03C76.02,19.44,78.86,18.19,81.98,18.19L81.98,18.19z M85.82,88.05l19.96,21.6 c1.58-2.39,2.5-5.25,2.5-8.33c0-8.36-6.78-15.14-15.14-15.14C90.48,86.17,87.99,86.85,85.82,88.05L85.82,88.05z M100.44,114.58 l-19.96-21.6c-1.58,2.39-2.5,5.25-2.5,8.33c0,8.36,6.78,15.14,15.14,15.14C95.78,116.46,98.27,115.78,100.44,114.58L100.44,114.58z"/></g></svg>
                                @error('image')
                                    <p class="text-red-500 text-xs">{{$message}}</p>
                                @enderror
                            @endif
                            
                            <div class="flex justify-end flex-row-reverse md:flex-row gap-1 items-center">
                                <input accept="image/*" type="file" name="image" id="edit-announcement-image" class="hidden" onchange="changeNameValue(this)"/>
                                <p id="image-value" class="ml-2 md:mr-2 hidden sm:block text-md border border-gray-200 p-2 rounded-md shadow-md text-sm max-w-15 overflow-hidden">{{$announcement->cover}}</p>
                                <input type="button" value="Change Image" id="input-change-clicker"
                                class="p-2 text-sm bg-greenBPC text-white rounded-md hover:bg-darkGreenBPC cursor-pointer"/>
                            </div>
                            <div class="text-center">
                                <input type="text" name="title" placeholder="Enter title" value="{{$announcement->title}}" class="text-center text-base md:text-2xl w-full border-1 mb-2 border-gray-100 rounded-md shadow-sm focus:border-greenBPC focus:ring-0" required>
                            </div>
                            <div>
                                <textarea name="content" cols="30" rows="10" class="w-full border-1 mb-2 border-gray-100 resize-none rounded-md shadow-sm focus:border-greenBPC focus:ring-0 text-sm md:text-base" placeholder="Enter announcement content here" required>{{$announcement->content}}</textarea>
                                <input type="hidden" name="id" value="{{$announcement->announcementID}}">
                            </div>
                            <div class="flex md:justify-end justify-start gap-2">
                                <a href="{{URL("/officer/contentManagement")}}" class="px-3 py-2 text-sm rounded-md shadow-md border hover:bg-gray-300">Cancel</a>
                                <input type="submit" value="Save" class="px-3 py-2 text-sm bg-greenBPC hover:bg-darkGreenBPC rounded-md text-white">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        const hiddenInputChanger = document.getElementById('edit-announcement-image')
        const inputChanger = document.getElementById('input-change-clicker')
        const imageName = document.getElementById('image-value')

        inputChanger.addEventListener('click', () => {
            hiddenInputChanger.click()
        })

        function changeNameValue (element) {
            console.log("nice")
            imageName.innerText = element.value
        }
    </script>
</x-officerLayout>