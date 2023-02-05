<!-- announcement title -->
<h2 class = "text-center text-darkGreenBPC my-6 text-2xl sm:text-3xl font-bold">
    Announcements
</h2>

<!-- announcements container -->
<div class = "w-full px-0 md:px-5 flex flex-row flex-wrap">
    @unless(count($announcements) == 0)
    @foreach ($announcements as $announcement)  
        <!-- dummy announcement 1 -->
        <x-announcementCard :announcement="$announcement" />
        
    @endforeach

    @else
        <p class = "text-center w-full py-10">No announcement found</p>
    @endunless

</div>