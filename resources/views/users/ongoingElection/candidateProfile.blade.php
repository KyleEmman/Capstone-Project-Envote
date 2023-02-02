
<div class="bg-white overflow-hidden rounded-lg shadow relative mx-2 sm:mx-0 sm:w-[500px]">

    <div class="py-[10px] px-10 flex flex-col font-bold items-start gap-3 h-[calc(100vh-80px)] overflow-auto mb-8">
        <div class = "w-full bg-greenBPC absolute top-0 right-0 text-white font-medium text-center py-3">
            Platform/s
            <button class = "absolute right-4 top-1 text-3xl" onclick="closeModalProfile()">&times;</button>
        </div>

        <img src="{{$candidate->cprofile->displayPhoto ? asset('storage/'.$candidate->cprofile->displayPhoto) : asset('assets/icons/userProfileIcon.png')}}" alt="user icon" 
        class="aspect-square rounded-full object-cover w-[100px] mx-auto mt-14">

        <h2 class="text-2xl">{{$candidate->position->title}}</h2>
        <h2 class="">{{$candidate->lastName . ", " . $candidate->firstName . " " . ($candidate->middleName ? $candidate->middleName : "")}}</h2>
        <h2>{{$candidate->program}}</h2>
        <div class="text-justify font-normal">
            {{$candidate->cprofile->platforms ? $candidate->cprofile->platforms : "No platform/s found"}}
        </div>
        
    </div>
  <p class="text-gray-600 p-2 bg-white absolute bottom-0 right-0 left-0 w-full font-normal">Last updated by: {{$candidate->cprofile->updatedBy ?? ""}}</p>
    
</div>

