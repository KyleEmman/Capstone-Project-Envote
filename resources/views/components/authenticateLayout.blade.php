<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/customStyle.css') }}" />
    <title>{{$heading}}</title>
    <link rel="icon" href="{{ URL::asset('assets/icons/studentGovernmentLogo.png') }}" type="image/icon type">
</head>

<body>
    <div id = "spinner"></div>
    <!-- main content -->
    <main class = "bg-green">

      <div class="px-4 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
          <div class = "flex w-full items-center justify-center">
            <svg class = "w-10 rotate-45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1200">
              <defs>
                <style>
                  .cls-1 {
                    fill: #034919;
                    fill-rule: evenodd;
                  }
                </style>
              </defs>
              <path class="cls-1" d="M426.821,218.909L511.032,115.92,775.3,1006.2l-79.414,83.45Z"/>
              <path class="cls-1" d="M416,190l93-92.008V1102.96L416,1014V190Z"/>
              <path id="Rectangle_3_copy" data-name="Rectangle 3 copy" class="cls-1" d="M784.784,189.575L692.216,97.992V1098.32l92.568-88.55V189.575Z"/>
              <path class="cls-1" d="M6.363,600L418.607,187.757l60.811,60.811L67.175,660.811Z"/>
              <path id="Rectangle_2_copy" data-name="Rectangle 2 copy" class="cls-1" d="M66.8,541.988L478.993,954.2l-60.8,60.806L6,602.8Z"/>
              <path id="Rectangle_2_copy_3" data-name="Rectangle 2 copy 3" class="cls-1" d="M1193.64,601.875L781.747,1013.99,720.988,953.2,1132.88,541.082Z"/>
              <path id="Rectangle_2_copy_3-2" data-name="Rectangle 2 copy 3" class="cls-1" d="M1133.25,659.869L721.413,247.777l60.751-60.789L1194,599.08Z"/>
              <path id="Rectangle_2_copy_2" data-name="Rectangle 2 copy 2" class="cls-1" d="M71,557l408,0.019,0,85.991-408-.019Z"/>
            </svg>
            
            <h1 class="text-2xl font-bold text-center text-darkGreenBPC sm:text-3xl">Envote</h1>
          </div>

          <p class="max-w-md mx-auto mt-4 text-center font-medium text-darkGreenBPC flex items-center justify-center text-sm sm:text-base">
              <img src="{{URL::asset('/assets/icons/BPCLogo.png')}}" alt="" class="w-16 mx-2 sm:mx-5">
              <span>

                <span>Bulacan Polytechnic College</span><br>
                <span class="hidden vsm:block">Voting System</span>
              </span>
              <img src = "{{URL::asset('/assets/icons/studentGovernmentLogo.png')}}" alt="SG LOGO" class="w-16 mx-2 sm:mx-5">
            </p>
            
            {{$slot}}
          
        </div>
      </div>


    </main>
    <x-flashMessage/>

</body>
    <script>
        var loader = document.getElementById("spinner");
        window.addEventListener("load", function(){
            loader.style.display = "none"
        })
    </script>

</html>
