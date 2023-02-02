@props(['announcement'])
<div
class = "annCard w-full rounded-xl my-3 md:w-[calc(50%-58px)] lg:w-[calc(33.33333%-58px)] mx-6 overflow-hidden relative cursor-pointer"
onclick = "showAnnDetails('announcement/{{$announcement->announcementID}}')">

    <!-- date -->
    <div class = "bg-darkGreenBPC/80 absolute text-white text-[100%] p-2 font-medium right-0">
        {{$announcement->created_at->format('F j, Y')}}
    </div>

    <!-- photo -->
    <div style = "background-image: url('{{$announcement->cover ? URL::asset('storage/' . $announcement->cover) : URL::asset('assets/img/Campus.jpg') }}');" 
    class = "annImage bg-center bg-cover h-36 sm:h-52 md:h-60 2xl:h-96"></div>

    <!-- content texts -->
    <div class = "m-4 mx-7">
        <!-- announcement title -->
        <h3 class="text-center text-xl md:text-xl xl:text-2xl 
        line-clamp-2 text-darkGreenBPC font-medium mb-3">
            {{$announcement->title}}
        </h3>

        <!-- content announcement -->
        <div class = "annContent h-0 transition-all flex items-center overflow-hidden">
            <p class="text-justify text-sm line-clamp-4">
                {{$announcement->content}}
            </p>
        </div>

    </div>
    
</div>