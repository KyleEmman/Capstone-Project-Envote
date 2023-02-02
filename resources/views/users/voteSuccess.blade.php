<x-default :heading="$heading">
    <section style = "background-image: url('../assets/img/Campus.jpg')" 
    class = "bg-darkGreenBPC w-full h-[200px] bg-cover bg-center bg-no-repeat relative pt-[200px] print:hidden">
        <div class = "absolute w-full h-full bg-darkGreenBPC/[0.95] z-10 top-0">
        </div>
    </section>

    <section class="w-auto px-4 md:px-20 flex flex-col bg-white pb-4">
        <div class="flex flex-col gap-1 mt-3 mb-8">
            <div class = "w-full flex items-center flex-col justify-center py-3 print:hidden" id = "congratsTitle">
                <h2 class = "relative text-darkGreenBPC text-3xl md:text-4xl font-medium z-10">
                    Voted Successfully!
                </h2>
                <p class = "relative text-darkGreenBPC">Here is your certificate as proof of your participation.</p>
            </div>
            <div class = "overflow-auto">
                <style>
                    #printThisButton{display:none;}
                </style>
                <x-e-certificate :cert="$cert" :election="$election" />
                <a href="{{URL($cert->url)}}" target="_blank" class="fixed z-[100] bottom-[70px] right-[70px] p-4 bg-greenBPC text-white 
                rounded-md hover:bg-darkGreenBPC">View certificate</a>
            </div>
        </div>
        <a href = "{{URL('/')}}" class = "bg-greenBPC mx-auto text-center print:hidden text-white text-lg w-full shadow-md hover:-translate-y-1 duration-500 hover:shadow-2xl hover:bg-darkGreenBPC
        font-medium rounded-full py-2">Continue</a>
    </section>
</x-default>