@props(['heading'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/customStyle.css') }}" />
    <title>{{$heading}}</title>
    <link rel="icon" href="{{ URL::asset('assets/icons/studentGovernmentLogo.png') }}" type="image/icon type">
    <script src="{{ URL::asset('https://code.jquery.com/jquery-3.6.1.js') }}" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src = "{{ asset('assets/js/adminScript.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background: #edf2f7;">
    <div id = "spinner"></div>
    <!-- navigation menu -->
    <aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col 
    overflow-auto justify-between h-screen border-r bg-white duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%] transition-all open" id = "navBarAd">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="{{ URL('/admin/dashboard')}}" title="home" class="flex items-center gap-2 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 rotate-[45deg]" viewBox="0 0 1200 1200">
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
                <h2 class="text-2xl font-bold text-darkGreenBPC">ENVote</h2>
            </a>
        </div>

        <div class="mt-8 text-center">

            <img src="{{auth()->guard('admin')->user()->displayPhoto ? asset('storage/'.auth()->guard('admin')->user()->displayPhoto) : URL::asset('/assets/icons/userProfileIcon.png')}}" alt="" class="w-10 h-10 m-auto rounded-full  md:block object-cover lg:w-28 lg:h-28">
        
            <h5 class=" mt-4 text-xl font-semibold text-gray-600 lg:block">{{ auth()->guard('admin')->user()->firstName}} {{ auth()->guard('admin')->user()->lastName }}</h5>
            <span class=" text-gray-400 lg:block">Admin</span>
        </div>

        <ul class="space-y-2 tracking-wide my-8">
            <!-- dashboard button navigation -->
            <li>
                <a href="{{URL('admin/dashboard')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "dashboardNav">
                    <svg class=" h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-white dark:fill-slate-600"></path>
                        <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-white group-hover:text-greenBPC"></path>
                        <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-green-100"></path>
                    </svg>
                    <span class="">Dashboard</span>
                </a>
            </li>
            <!-- elections button navigation -->
            <li>
                <a href="{{URL('admin/elections')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "electionsNav">
                    <svg version="1.1" id="Layer_1" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 512.003 512.003" style="enable-background:new 0 0 512.003 512.003;" xml:space="preserve">
                        <g><g>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M505.538,64.857l-149.333-64c-4.373-1.877-9.515-0.597-12.523,3.136l-42.667,53.333c-2.027,2.517-2.795,5.803-2.091,8.96
                                c0.661,3.008,2.624,5.483,5.291,6.955l-134.016,50.261c-11.243,4.224-20.864,12.224-27.029,22.507l-44.288,73.813
                                c-9.429,15.723-10.176,34.901-1.963,51.285l3.115,6.229H53.335c-5.888,0-10.667,4.779-10.667,10.667V490.67h-32
                                c-5.888,0-10.667,4.779-10.667,10.667c0,5.888,4.779,10.667,10.667,10.667h362.667c5.888,0,10.667-4.779,10.667-10.667
                                c0-5.888-4.779-10.667-10.667-10.667h-32V341.337c0-0.811-0.299-1.515-0.448-2.261c20.011-13.547,42.88-34.453,62.827-66.752
                                c33.899-54.827,52.949-98.965,60.779-118.827l1.195,0.597c4.565,2.283,9.451,3.413,14.336,3.413c5.824,0,11.627-1.6,16.789-4.821
                                c9.515-5.867,15.189-16.043,15.189-27.221V74.649C512.002,70.382,509.463,66.542,505.538,64.857z M320.002,490.67h-256v-192
                                h53.483c0.256,0,0.512,0.021,0.789,0h84.565c-9.621,5.845-21.44,13.205-36.395,22.72c-11.371,7.232-19.157,18.453-21.931,31.637
                                c-2.795,13.184-0.213,26.645,7.317,37.909c9.536,14.357,25.259,22.165,41.344,22.165c8.704,0,17.536-2.304,25.536-7.061
                                l73.301-43.968c4.203-1.024,14.507-3.989,27.989-10.709V490.67z M178.391,250.393c16.32-6.997,38.144-19.669,49.216-32.576
                                c8.512,4.992,21.909,11.413,38.656,14.699c-11.904,14.741-23.851,32.661-28.907,45.355c-0.875-0.235-1.728-0.533-2.688-0.533
                                H190.85C188.588,266.734,183.362,257.369,178.391,250.393z M385.623,261.102c-42.069,68.053-99.115,80.363-99.669,80.469
                                c-1.195,0.256-2.368,0.704-3.413,1.323l-74.752,44.843c-13.013,7.829-29.781,4.053-38.229-8.619
                                c-4.267-6.421-5.739-14.101-4.16-21.632c1.6-7.509,6.037-13.931,12.523-18.048c57.323-36.501,67.669-40.512,67.456-40.747
                                c5.909,0,10.645-4.267,10.645-10.155c1.088-6.677,20.523-37.909,39.573-56.96c3.051-3.051,3.968-7.637,2.304-11.627
                                c-1.643-3.989-5.547-6.592-9.856-6.592c-33.195,0-57.088-18.795-57.323-18.987c-3.2-2.539-7.488-3.733-11.2-1.941
                                c-3.712,1.771-5.973,4.843-5.973,8.939c-3.776,9.152-44.715,32.299-53.547,33.301c-4.395,0-8.299,2.667-9.899,6.763
                                c-1.6,4.096-0.533,8.747,2.688,11.733c0.128,0.128,11.307,10.752,15.872,24.171h-44.757l-7.872-15.787
                                c-4.928-9.835-4.501-21.333,1.173-30.763l44.288-73.813c3.712-6.187,9.472-10.965,16.213-13.504l152.363-57.131l115.264,57.621
                                C438.274,161.987,419.436,206.382,385.623,261.102z M490.668,125.507c0,5.376-3.541,8.128-5.056,9.067s-5.589,2.859-10.368,0.469
                                L325.911,60.377l29.355-36.672l135.403,58.027V125.507z"/>
                        </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                    </svg>

                    <span class="">Elections</span>
                </a>
            </li>
            <!-- accounts button navigation -->
            <li>
                <a href="{{URL('admin/accounts')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "accountsNav">
                    <svg class = "h-4 w-4" width="1024px" height="1024px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M511.728 64c108.672 0 223.92 91.534 223.92 159.854v159.92c0 61.552-25.6 179.312-94.256 233.376a63.99 63.99 0 0 0-23.968 57.809c2.624 22.16 16.592 41.312 36.848 50.625l278.496 132.064c2.176.992 26.688 5.104 26.688 39.344l.032 62.464L64 959.504V894.56c0-25.44 19.088-33.425 26.72-36.945l281.023-132.624c20.16-9.248 34.065-28.32 36.769-50.32 2.72-22-6.16-43.84-23.456-57.712-66.48-53.376-97.456-170.704-97.456-233.185v-159.92C287.615 157.007 404.016 64 511.728 64zm0-64.002c-141.312 0-288.127 117.938-288.127 223.857v159.92c0 69.872 31.888 211.248 121.392 283.088l-281.04 132.64S.001 827.999.001 863.471v96.032c0 35.344 28.64 63.968 63.951 63.968h895.552c35.344 0 63.968-28.624 63.968-63.968v-96.032c0-37.6-63.968-63.968-63.968-63.968L681.008 667.439c88.656-69.776 118.656-206.849 118.656-283.665v-159.92c0-105.92-146.64-223.855-287.936-223.855z"/>
                        </svg>
                    <span class="">Users</span>
                </a>
            </li>
            <!-- candidates button navigation -->
            <li>
                <a href="{{URL('admin/candidates')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id="candidatesNav">
                    <svg class = "h-4 w-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="125.023px" height="125.023px" viewBox="0 0 125.023 125.023" style="enable-background:new 0 0 125.023 125.023;"
                    xml:space="preserve">
                    <g>
                        <g>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M65.176,57.92c16,0,28.952-12.972,28.952-28.962C94.128,12.963,81.176,0,65.176,0C49.183,0,36.218,12.964,36.218,28.958
                                C36.218,44.949,49.183,57.92,65.176,57.92z"/>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M72.632,59.087l-7.211,7.264l-6.993-7.34c-0.024,0.006-0.05,0.006-0.066,0.012c-1.167,0.28-6.12,1.856-12.546,6.465
                                c-0.057,0.04-1.362,0.945-1.973,1.328c-1.213,0.766-3.024,1.875-5.215,2.922c-2.178,1.064-4.758,2.027-7.106,2.531
                                c-1.159,0.23-2.206,0.293-3.047,0.266c-0.869-0.016-1.369-0.204-1.899-0.436c-0.285-0.066-0.496-0.334-0.808-0.482
                                c-0.244-0.324-0.597-0.479-0.862-0.939c-0.142-0.203-0.305-0.373-0.457-0.593l-0.411-0.761c-0.318-0.452-0.519-1.126-0.776-1.706
                                c-0.281-0.558-0.426-1.292-0.635-1.935c-0.218-0.637-0.364-1.336-0.491-2.037c-0.322-1.348-0.473-2.755-0.63-4.047
                                c-0.193-1.274-0.181-2.553-0.276-3.632c-0.003-0.031-0.001-0.058-0.003-0.089c0.613-0.878,1.446-1.67,2.459-2.405
                                c1.012-0.727,1.808-1.937,2.336-3.094c2.054-4.563,2.947-7.176,4.421-11.962c0.622-2.016-3.096-4.247-5.522,1.459
                                c-1.026,2.067-0.578,2.279-1.621,4.338l-0.373,0.701c0,0-0.215-1.988-0.243-2.589c-0.323-6.89-0.618-10.586-0.949-17.476
                                c-0.09-1.911-0.886-2.762-2.361-2.66c-1.404,0.101-2.021,0.966-1.946,2.823c0.151,3.761,0.331,4.323,0.483,8.081
                                c0.071,1.417-0.851,1.148-0.845-0.006c-0.244-5.126-0.477-6.258-0.683-11.385c-0.058-1.392-0.637-2.305-2.064-2.458
                                c-1.379-0.146-2.321,0.999-2.251,2.742c0.205,4.955,0.45,5.915,0.654,10.871c0.072,1.466-0.83,1.235-0.833,0.133
                                c-0.183-3.928-0.299-4.667-0.583-8.588c-0.055-0.79-0.535-1.828-1.156-2.242c-1.515-1.009-3.171,0.277-3.101,2.369
                                c0.146,4.387,0.383,5.577,0.564,9.96c0.109,1.125-0.772,1.427-0.82,0.117c-0.136-2.791-0.241-2.389-0.394-5.177
                                c-0.07-1.271-0.794-1.997-2.072-2.046c-1.291-0.047-2.002,0.704-2.212,1.918c-0.09,0.497-0.042,1.022-0.019,1.531
                                c0.294,6.608,0.471,10.029,0.959,16.622c0.174,2.309,0.451,3.921,0.829,5.785c0.378,1.864,1.418,2.743,1.667,3.666
                                c-0.058,1.068-0.128,2.19-0.086,3.477c0.023,1.71,0.033,3.558,0.27,5.615c0.082,1.012,0.19,2.062,0.416,3.182
                                c0.215,1.114,0.345,2.219,0.72,3.428c0.348,1.197,0.616,2.388,1.18,3.666c0.259,0.63,0.52,1.264,0.783,1.9
                                c0.312,0.643,0.69,1.293,1.051,1.939c0.659,1.296,1.715,2.576,2.692,3.828c1.162,1.193,2.332,2.404,3.784,3.361
                                c2.788,1.992,6.115,3.328,9.163,3.834c3.063,0.549,5.932,0.553,8.498,0.308c0.689-0.077,1.532-0.168,2.192-0.269l0.019,33.848
                                h59.882v-12.961c1.321,3.738,2.566,8.053,3.745,12.961h23.102C116.131,93.336,98.253,67.534,72.632,59.087z M65.487,123.662
                                h-0.128l-6.987-9.557l6.987-46.678h0.128l6.992,46.678L65.487,123.662z"/>
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

                    <span class="">Candidate Applications</span>
                
                </a>
            </li>
            <!-- password reset button navigation -->
            <li>
                <a href="{{URL('admin/passwords')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "passwordResetsNav">
                    <svg class = "w-4 h-4" width="512px" height="512px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <g id="Change_password">
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M464.4326,147.54a9.8985,9.8985,0,0,0-17.56,9.1406,214.2638,214.2638,0,0,1-38.7686,251.42c-83.8564,83.8476-220.3154,
                            83.874-304.207-.0088a9.8957,9.8957,0,0,0-16.8926,7.0049v56.9a9.8965,9.8965,0,0,0,19.793,0v-34.55A234.9509,234.9509,0,0,0,464.4326,147.54Z"/>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M103.8965,103.9022c83.8828-83.874,220.3418-83.8652,304.207-.0088a9.8906,9.8906,0,0,0,16.8926-6.9961v-56.9a9.8965,9.8965,0,0,0-19.793,
                            0v34.55C313.0234-1.3556,176.0547,3.7509,89.9043,89.9012A233.9561,233.9561,0,0,0,47.5674,364.454a9.8985,9.8985,0,0,0,17.56-9.1406A214.2485,
                            214.2485,0,0,1,103.8965,103.9022Z"/>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M126.4009,254.5555v109.44a27.08,27.08,0,0,0,27,27H358.5991a27.077,27.077,0,0,0,27-27v-109.44a27.0777,27.0777,0,0,
                            0-27-27H153.4009A27.0805,27.0805,0,0,0,126.4009,254.5555ZM328,288.13a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,328,288.13Zm-72,0a21.1465,
                            21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,256,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,184,288.13Z"/>
                            <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M343.6533,207.756V171.7538a87.6533,87.6533,0,0,0-175.3066,0V207.756H188.14V171.7538a67.86,67.86,0,0,1,135.7208,0V207.756Z"/></g>
                        </svg>

                    <span class="">Password Resets</span>
                </a>
            </li>
            <li>
                <a href="{{URL('admin/logs')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "logsNav">
                    <svg class = "w-4 h-4" width="512px" height="512px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <g>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M159,171h303c22.056,0,40-17.944,40-40c0-22.056-17.944-40-40-40H159c-22.056,0-40,17.944-40,40
                                        C119,153.056,136.944,171,159,171z M159,111h303c11.028,0,20,8.972,20,20s-8.972,20-20,20H159c-11.028,0-20-8.972-20-20
                                        S147.972,111,159,111z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M462,211H159c-22.056,0-40,17.944-40,40c0,22.056,17.944,40,40,40h303c22.056,0,40-17.944,40-40
                                        C502,228.944,484.056,211,462,211z M462,271H159c-11.028,0-20-8.972-20-20s8.972-20,20-20h303c11.028,0,20,8.972,20,20
                                        S473.028,271,462,271z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M462,331H159c-22.056,0-40,17.944-40,40c0,22.056,17.944,40,40,40h303c22.056,0,40-17.944,40-40
                                        C502,348.944,484.056,331,462,331z M462,391H159c-11.028,0-20-8.972-20-20s8.972-20,20-20h303c11.028,0,20,8.972,20,20
                                        S473.028,391,462,391z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M49,82c-27.019,0-49,21.981-49,49s21.981,49,49,49s49-21.981,49-49S76.019,82,49,82z M49,160c-15.991,0-29-13.009-29-29
                                        c0-15.991,13.009-29,29-29s29,13.009,29,29C78,146.991,64.991,160,49,160z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M49,202c-27.019,0-49,21.981-49,49c0,27.019,21.981,49,49,49s49-21.981,49-49S76.019,202,49,202z M49,280
                                        c-15.991,0-29-13.009-29-29c0-15.991,13.009-29,29-29s29,13.009,29,29C78,266.991,64.991,280,49,280z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M49,322c-27.019,0-49,21.981-49,49c0,27.019,21.981,49,49,49s49-21.981,49-49C98,343.981,76.019,322,49,322z M49,400
                                        c-15.991,0-29-13.009-29-29c0-15.991,13.009-29,29-29s29,13.009,29,29C78,386.991,64.991,400,49,400z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M216,139h171c5.523,0,10-4.477,10-10s-4.477-10-10-10H216c-5.523,0-10,4.477-10,10S210.477,139,216,139z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M158,139h18c5.523,0,10-4.477,10-10s-4.477-10-10-10h-18c-5.523,0-10,4.477-10,10S152.477,139,158,139z"/>
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

                    <span class="">Activity Logs</span>
                </a>
            </li>
            <!-- settings button navigation -->
            <li>
                <a href="{{URL('admin/settings')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group hover:bg-gray-200" id = "settingsNav">
                    <svg class = "h-4 w-4" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 489.8 489.8" style="enable-background:new 0 0 489.8 489.8;" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M469.1,182.95h-38.2c-3.1-8.3-6.2-16.6-10.3-23.8l26.9-26.9c8.3-8.2,8.3-20.6,0-28.9l-60-60c-8.2-8.3-20.6-8.3-28.9,0
                                        l-27.9,27.9c-7.2-3.1-15.5-6.2-22.7-9.3v-39.3c0-11.4-9.3-20.7-20.7-20.7h-84.8c-11.4,0-20.7,9.3-20.7,20.7v37.1
                                        c-8.2,3.1-15.5,6.2-22.7,9.3l-27.9-27.9c-8.2-8.3-20.6-8.3-28.9,0l-60,60c-8.3,8.2-8.3,20.6,0,28.9l26.9,26.9
                                        c-4.1,8.3-7.2,15.5-10.3,23.8H20.7c-11.4,0-20.7,9.3-20.7,20.7v84.8c0,11.4,9.3,20.7,20.7,20.7h35.1c3.1,8.3,6.2,16.5,10.3,24.8
                                        l-25.8,25.8c-4.1,4.1-11.6,16.3,0,28.9l60,60c8.2,8.3,20.6,8.3,28.9,0l24.8-24.8c8.2,5.2,16.5,8.3,25.8,11.4v34.1
                                        c0,11.4,9.3,20.7,20.7,20.7h84.8c11.4,0,20.7-9.3,19.7-18.5v-34.1c8.2-3.1,17.5-7.3,25.8-11.4l24.8,24.8c8.2,8.3,20.6,8.3,28.9,0
                                        l60-60c8.3-8.2,8.3-20.6,0-28.9l-25.8-25.8c4.1-8.3,7.2-16.5,10.3-24.8h40.1c11.4,0,20.7-9.3,20.7-20.7v-84.8
                                        C489.8,192.25,480.5,182.95,469.1,182.95z M445.6,266.75h-31c-9.3,0-17.5,6.2-19.6,15.5c-4.2,15.5-9.3,30-17.6,43.4
                                        c-5.2,8.3-3.1,18.6,3.1,24.8l21.7,21.7l-31,31l-20.7-20.7c-6.2-7.2-16.5-8.3-24.8-3.1c-14.5,8.3-29,14.5-44.5,18.6
                                        c-9.3,2-15.5,10.3-15.5,19.6v30h-44.5v-0.1h-1v-30c0-9.3-6.2-17.5-15.5-19.6c-15.6-4.1-31.1-10.3-44.5-18.6
                                        c-8.3-5.2-18.6-3.1-24.8,3.1l-20.7,20.7l-31-31l21.7-21.7c6.2-7.2,8.3-16.5,3.1-24.8c-8.3-13.4-14.5-27.9-17.6-43.4
                                        c-2-9.3-10.3-15.5-19.6-15.5h-31v-44.5h33.1c9.3,0,17.5-6.2,19.6-15.5c3.1-14.5,9.3-28,17.6-41.4c5.2-8.3,3.1-18.6-3.1-24.8
                                        l-23.8-23.8l31-31l23.8,23.8c7.2,6.2,16.5,8.3,24.8,3.1c13.5-7.2,26.9-13.4,41.4-16.5c9.3-2,15.5-10.3,15.5-19.6v-34.1h44.5v35.2
                                        c0,9.3,6.2,17.5,15.5,19.6c14.5,3.1,29,9.3,41.4,16.5c8.3,5.2,18.6,3.1,24.8-3.1l24.8-24.8l31,31l-23.8,23.8
                                        c-7.2,6.2-8.3,16.5-3.1,24.8c7.3,12.5,13.5,26.9,17.6,41.4c2,9.3,10.3,15.5,19.6,15.5h33.1V266.75z"/>
                                    <path class="fill-current text-gray-600 group-hover:text-greenBPC" d="M242.9,132.25c-62,0-112.7,50.7-112.7,112.7s50.7,112.7,112.7,112.7c62.1,0,112.7-50.7,112.7-112.7
                                        S304.9,132.25,242.9,132.25z M242.9,317.35c-39.3,0-72.4-32.1-72.4-72.4c0-39.3,32.1-72.4,72.4-72.4c40.3,0,72.4,32.1,72.4,72.4
                                        C315.3,284.25,282.2,317.35,242.9,317.35z"/>
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

                    <span class="">Settings</span>
                
                </a>
            </li>
        </ul>
    </div>

    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
        <a href="{{ URL('/admin/logout')}}" class="hover:bg-gray-200 w-full rounded-md">
            <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="">Logout</span>
            </button>
        </a>
    </div>
    </aside>

    <!-- contents -->
    {{$slot}}
    <x-flashMessage />
    <script>
        var loader = document.getElementById("spinner");
        window.addEventListener("load", function(){
            loader.style.display = "none"
        })
    </script>
</body>
</html>