<div class = "w-full bg-gray-100 py-3 mb-3 flex">

    <a class="mx-8 p-3 py-[10px] font-medium text-gray-700
    pr-10 w-auto text-sm shadow-black/[0.07] flex items-center"
    href = "{{URL('/')}}"
    >
        <img class = "w-5 mr-2 opacity-75" src="{{ URL::asset('assets/icons/backgIcon.png') }}" alt="">
        Back
    </a>

</div>

<!-- announcement contents -->
<div class = "w-auto mx-4 md:mx-10 p-5 flex flex-col justify-center rounded-lg mb-10 border border-gray-100 shadow-xl">
    <!-- announcement photo -->
    <div class = "w-full flex justify-center">
        <img class = "w-full md:w-9/12 rounded-md" 
        src = "{{ $announcement->cover ? URL::asset('storage/' . $announcement->cover) : URL::asset('assets/img/Campus.jpg')  }}">
    </div>

    <h2 class = "text-center text-darkGreenBPC w-full my-6 text-2xl sm:text-3xl font-bold">
        {{$announcement->title}}
    </h2>
    <!-- content goes here -->
    <div class = "p-5 pt-0">
        {{$announcement->content}}
    </div>
    
</div>
