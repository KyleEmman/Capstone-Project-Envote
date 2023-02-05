<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
          href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
          rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/customStyle.css')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <title>Certificate</title>
    <link rel="icon" href="{{asset('assets/icons/studentGovernmentLogo.png')}}" type="image/icon type">
</head>
<body>
<style type="text/css" media="print">
    body {
    -webkit-print-color-adjust: exact !important;
    }
    @page { size: A4 !important; }
    @page { margin: 0mm !important; }
    @page {size: landscape !important;}
    button {
        display:none;
    }

</style>
<main class = "">
    <button id = "printThisButton" onclick = "window.print()" class="fixed z-[100] bottom-[70px] right-[70px] p-4 bg-greenBPC text-white 
    rounded-md hover:bg-darkGreenBPC">
        Save PDF
    </button>
    <div id = "printable-content" class="w-[1056px] h-[816px] m-auto bg-[#e6fcd8] relative overflow-hidden" id="certificate">
        <!-- top left yellow div -->
        <div class="bg-greenBPC h-[150px] w-[800px] rotate-[-10deg] translate-y-[-85px] 
        translate-x-[-100px] absolute"></div>
        <!-- top right black div -->
        <div class="bg-[#0e0e0e] h-[150px] w-[500px] absolute right-0 rotate-[15deg] translate-x-[50px] 
        translate-y-[-100px]"></div>
        <!-- bottom left black div -->
        <div class="bg-[#0e0e0e] h-[200px] w-[900px] rotate-[10deg] absolute bottom-0 translate-x-[-50px]
        translate-y-[130px] z-[3]"></div>
        <!-- bottom right yellow div -->
        <div class="bg-greenBPC h-[100px] w-[800px] rotate-[-10deg] absolute bottom-0 right-0
        translate-x-[250px] translate-y-[50px] z-[5]"></div>
        <!-- bottom right orange div big -->
        <div class="bg-darkGreenBPC h-[250px] w-[900px] rotate-[-25deg] absolute bottom-0 right-0
        translate-x-[250px] translate-y-[60px] "></div>
        <!-- border na black -->
        <div class="h-[96%] w-[96%] absolute m-[2%] border border-black z-50"></div>
        
        <div class="flex flex-col items-center justify-center gap-1 mt-[35px]">
            <img src="{{asset('assets/icons/BPCLogo.png')}}" alt='bpc-logo' class="w-20">
            <h2 class="text-2xl font-lobster text-greenBPC">BULACAN POLYTECHNIC COLLEGE</h2>
            <h2 class="font-mono">Bulihan, City of Malolos, Bulacan</h2>
            <h2 class="font-mono">Management Information System Office</h2>
            <h2 class="font-cursive text-[5rem] text-[#C43C38] my-5">Certificate of Participation</h2>
            <h2 class="font-mono text-sm">This is to certify that</h2>
            <h2 class="font-mono text-4xl text-gsreenBPC my-5">{{strtoupper($cert->firstName)}} {{strtoupper($cert->lastName)}}</h2>
            <h2 class="font-mono text-sm">has participated in the</h2>
            <h2 class="font-mono text-2xl text-[#192265]">{{$cert->election()->first()->title}} - {{$cert->election()->first()->campus}} Campus</h2>
            <h2 class="font-mono text-sm">in the Academic Year {{$cert->schoolYear}}.</h2>
            <h2 class="font-mono">Given this {{$cert->created_at->format('F j, Y')}}</h2>
            <h2 class="font-mono my-3">This is issued for the purpose of end-of-semester clearance</h2>
            <h2 class="font-mono mt-4 border-t border-black">DR. ROSEMARIE S. GUIRRE</h2>
            <h2 class="font-mono">MIS Dept. Head</h2>
            <div class = "z-50 w-[90px] aspect-square absolute bottom-[90px] right-[100px]">
            {!! QrCode::size(100)->backgroundColor(3,73,25)->generate($cert->url) !!}
            </div>
        </div>
       
    </div>
</main>
</body>
</html>