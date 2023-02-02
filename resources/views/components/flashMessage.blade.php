@if(session()->has('successMessage'))
    <div class = "z-[100] bg-black/25 fixed top-0 bottom-0 right-0 left-0 flex justify-center items-center">
        <div class = "bg-white rounded-md shadow-md flex items-center justify-center flex-col p-10 mx-5 pb-6 relative max-w-md min-w-0">

            <button class = "text-gray-600 font-bold absolute top-0 right-0 text-xl m-3 mt-1" onclick = "closeModal(this)">&times</button>

            <svg class = "fill-greenBPC w-14 h-14 mb-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 330 330" xml:space="preserve">
                <g>
                <path d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
                c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z"/>
                <path d="M226.872,106.664l-84.854,84.853l-38.89-38.891c-5.857-5.857-15.355-5.858-21.213-0.001
                c-5.858,5.858-5.858,15.355,0,21.213l49.496,49.498c2.813,2.813,6.628,4.394,10.606,4.394c0.001,0,0,0,0.001,0
                c3.978,0,7.793-1.581,10.606-4.393l95.461-95.459c5.858-5.858,5.858-15.355,0-21.213
                C242.227,100.807,232.73,100.806,226.872,106.664z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g>
                    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
            </svg>
            <p class = "text-gray-600 font-semibold text-center mb-5">{{session('successMessage')}}</p>
            <button class = "bg-greenBPC/90 text-white px-3 py-1 rounded-md" onclick = "closeModal(this)">Okay</button>
        </div>
    </div>
@elseif(session()->has('errorMessage'))
    <div class = "z-[100] bg-black/25 fixed top-0 bottom-0 right-0 left-0 flex justify-center items-center">
        <div class = "bg-white rounded-md shadow-md flex items-center justify-center flex-col p-10 mx-5 pb-6 relative max-w-md min-w-0">

            <button class = "text-gray-600 font-bold absolute top-0 right-0 text-xl m-3 mt-1" onclick = "closeModal(this)">&times</button>

            <svg class = "fill-red-600 w-14 h-14 mb-5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <path d="M256,0C114.6,0,0,114.6,0,256s114.6,256,256,256s256-114.6,256-256S397.4,0,256,0z M64,256c0-106.1,86-192,192-192
                c42.1,0,81,13.7,112.6,36.7L100.7,368.6C77.7,337,64,298.1,64,256z M256,448c-42.1,0-81-13.7-112.6-36.7l267.9-267.9
                c23,31.7,36.7,70.5,36.7,112.6C448,362.1,362,448,256,448z"/>
            </svg>
    
            <p class = "text-gray-600 font-semibold text-center mb-5">{{session('errorMessage')}}</p>
            <button class = "bg-red-600 text-white px-3 py-1 rounded-md" onclick = "closeModal(this)">Close</button>
        </div>
    </div>
@elseif(session()->has('infoMessage'))
    <div class = "z-[100] bg-black/25 fixed top-0 bottom-0 right-0 left-0 flex justify-center items-center">
        <div class = "bg-white rounded-md shadow-md flex items-center justify-center flex-col p-10 mx-5 pb-6 relative max-w-md min-w-0">

            <button class = "text-gray-600 font-bold absolute top-0 right-0 text-xl m-3 mt-1" onclick = "closeModal(this)">&times</button>

            <svg class = "fill-gray-500 w-14 h-14 mb-5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <path d="M165,0.008C74.019,0.008,0,74.024,0,164.999c0,90.977,74.019,164.992,165,164.992s165-74.015,165-164.992
                                C330,74.024,255.981,0.008,165,0.008z M165,299.992c-74.439,0-135-60.557-135-134.992S90.561,30.008,165,30.008
                                s135,60.557,135,134.991C300,239.436,239.439,299.992,165,299.992z"/>
                            <path d="M165,130.008c-8.284,0-15,6.716-15,15v99.983c0,8.284,6.716,15,15,15s15-6.716,15-15v-99.983
                                C180,136.725,173.284,130.008,165,130.008z"/>
                            <path d="M165,70.011c-3.95,0-7.811,1.6-10.61,4.39c-2.79,2.79-4.39,6.66-4.39,10.61s1.6,7.81,4.39,10.61
                                c2.79,2.79,6.66,4.39,10.61,4.39s7.81-1.6,10.609-4.39c2.79-2.8,4.391-6.66,4.391-10.61s-1.601-7.82-4.391-10.61
                                C172.81,71.61,168.95,70.011,165,70.011z"/>
                        </g>
                    </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </svg>
    
            <p class = "text-gray-600 font-semibold text-center mb-5">{{session('infoMessage')}}</p>
            <button class = "bg-greenBPC/90 text-white px-3 py-1 rounded-md" onclick = "closeModal(this)">Okay</button>
        </div>
    </div>
@endif

<script>
    function closeModal(button){
        button.parentElement.parentElement.remove();
    }
</script>