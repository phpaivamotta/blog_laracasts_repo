<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Publicado <time> {{ $post->created_at->diffForHumans() }} </time>
                    </p>

                    <div class="flex items-center lg:justify-left text-sm mt-4">

                        <a href="/sobre">
                            <img src="{{ isset($post->author->profile_pic)
                                ? asset('storage/' . $post->author->profile_pic)
                                : '/images/generic_profile_pic.png' }}"
                                alt="Foto de Perfil" class="rounded-xl square">
                        </a>

                        <div class="ml-3 text-left">
                            <h5 class="font-bold"><a href="/sobre">{{ $post->author->name }}</a></h5>
                        </div>
                    </div>

                    <div class="flex items-center lg:justify-left mt-4 text-gray-700">
                        <a href="https://twitter.com/PolianaPorce/" target="_blank">
                            <svg viewBox="0 0 512 512" class="hover:text-blue-500" width="21">
                                <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                        </a>

                        <a href="https://www.linkedin.com/in/jessica-szklarz-a04a6984/" target="_blank">
                            <svg width="30" viewBox="0 0 25 25" class="hover:text-blue-500 ml-1">
                                <path fill="currentColor"
                                    d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{ session('blog_url') ? session('blog_url') : '/' }}"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Voltar aos Posts
                        </a>

                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>

                    <div class="flex items-center justify-between">

                        {{-- buttons --}}
                        <div class="flex mt-8" id="likes">
                            <div class="flex items-center text-white px-1">

                                @livewire('manage-likes', ['postId' => $post->id])

                                @livewire('count-comments', ['postId' => $post->id])

                            </div>
                        </div>

                        {{-- share icon and dropdown --}}
                        <div x-data="{ show: false }" @click.away="show=false" class="mt-8">

                            <div class="flex">

                                <div x-show="show" class="flex bg-gray-300 rounded-xl px-3 space-x-2 items-center"
                                    style="display: none;">
                                    <a href="{{ $links['facebook'] }}" target="_blank">
                                        <svg version="1.1" viewBox="0 0 512 512" width="40"
                                            class="text-my-gray hover:text-blue-500"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path fill="currentColor"
                                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ $links['linkedin'] }}" target="_blank">
                                        <svg version="1.1" viewBox="0 0 512 512" width="40"
                                            class="text-my-gray hover:text-blue-500"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path fill="currentColor"
                                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-288.985,423.278l0,-225.717l-75.04,0l0,225.717l75.04,0Zm270.539,0l0,-129.439c0,-69.333 -37.018,-101.586 -86.381,-101.586c-39.804,0 -57.634,21.891 -67.617,37.266l0,-31.958l-75.021,0c0.995,21.181 0,225.717 0,225.717l75.02,0l0,-126.056c0,-6.748 0.486,-13.492 2.474,-18.315c5.414,-13.475 17.767,-27.434 38.494,-27.434c27.135,0 38.007,20.707 38.007,51.037l0,120.768l75.024,0Zm-307.552,-334.556c-25.674,0 -42.448,16.879 -42.448,39.002c0,21.658 16.264,39.002 41.455,39.002l0.484,0c26.165,0 42.452,-17.344 42.452,-39.002c-0.485,-22.092 -16.241,-38.954 -41.943,-39.002Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ $links['twitter'] }}" target="_blank">
                                        <svg version="1.1" viewBox="0 0 512 512" width="40"
                                            class="text-my-gray hover:text-blue-500"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path fill="currentColor"
                                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-253.927,424.544c135.939,0 210.268,-112.643 210.268,-210.268c0,-3.218 0,-6.437 -0.153,-9.502c14.406,-10.421 26.973,-23.448 36.935,-38.314c-13.18,5.824 -27.433,9.809 -42.452,11.648c15.326,-9.196 26.973,-23.602 32.49,-40.92c-14.252,8.429 -30.038,14.56 -46.896,17.931c-13.487,-14.406 -32.644,-23.295 -53.946,-23.295c-40.767,0 -73.87,33.104 -73.87,73.87c0,5.824 0.613,11.494 1.992,16.858c-61.456,-3.065 -115.862,-32.49 -152.337,-77.241c-6.284,10.881 -9.962,23.601 -9.962,37.088c0,25.594 13.027,48.276 32.95,61.456c-12.107,-0.307 -23.448,-3.678 -33.41,-9.196l0,0.92c0,35.862 25.441,65.594 59.311,72.49c-6.13,1.686 -12.72,2.606 -19.464,2.606c-4.751,0 -9.348,-0.46 -13.946,-1.38c9.349,29.426 36.628,50.728 68.965,51.341c-25.287,19.771 -57.164,31.571 -91.8,31.571c-5.977,0 -11.801,-0.306 -17.625,-1.073c32.337,21.15 71.264,33.41 112.95,33.41Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ $links['whatsapp'] }}" target="_blank">
                                        <svg version="1.1" viewBox="0 0 512 512" width="40"
                                            class="text-my-gray hover:text-blue-500"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path fill="currentColor"
                                                d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-58.673,127.703c-33.842,-33.881 -78.847,-52.548 -126.798,-52.568c-98.799,0 -179.21,80.405 -179.249,179.234c-0.013,31.593 8.241,62.428 23.927,89.612l-25.429,92.884l95.021,-24.925c26.181,14.28 55.659,21.807 85.658,21.816l0.074,0c98.789,0 179.206,-80.413 179.247,-179.243c0.018,-47.895 -18.61,-92.93 -52.451,-126.81Zm-126.797,275.782l-0.06,0c-26.734,-0.01 -52.954,-7.193 -75.828,-20.767l-5.441,-3.229l-56.386,14.792l15.05,-54.977l-3.542,-5.637c-14.913,-23.72 -22.791,-51.136 -22.779,-79.287c0.033,-82.142 66.867,-148.971 149.046,-148.971c39.793,0.014 77.199,15.531 105.329,43.692c28.128,28.16 43.609,65.592 43.594,105.4c-0.034,82.149 -66.866,148.983 -148.983,148.984Zm81.721,-111.581c-4.479,-2.242 -26.499,-13.075 -30.604,-14.571c-4.105,-1.495 -7.091,-2.241 -10.077,2.241c-2.986,4.483 -11.569,14.572 -14.182,17.562c-2.612,2.988 -5.225,3.364 -9.703,1.12c-4.479,-2.241 -18.91,-6.97 -36.017,-22.23c-13.314,-11.876 -22.304,-26.542 -24.916,-31.026c-2.612,-4.484 -0.279,-6.908 1.963,-9.14c2.016,-2.007 4.48,-5.232 6.719,-7.847c2.24,-2.615 2.986,-4.484 4.479,-7.472c1.493,-2.99 0.747,-5.604 -0.374,-7.846c-1.119,-2.241 -10.077,-24.288 -13.809,-33.256c-3.635,-8.733 -7.327,-7.55 -10.077,-7.688c-2.609,-0.13 -5.598,-0.158 -8.583,-0.158c-2.986,0 -7.839,1.121 -11.944,5.604c-4.105,4.484 -15.675,15.32 -15.675,37.364c0,22.046 16.048,43.342 18.287,46.332c2.24,2.99 31.582,48.227 76.511,67.627c10.685,4.615 19.028,7.371 25.533,9.434c10.728,3.41 20.492,2.929 28.209,1.775c8.605,-1.285 26.499,-10.833 30.231,-21.295c3.732,-10.464 3.732,-19.431 2.612,-21.298c-1.119,-1.869 -4.105,-2.99 -8.583,-5.232Z" />
                                        </svg>
                                    </a>
                                </div>

                                <button @click="show = !show">
                                    <svg viewBox="-10 -10 40 40" version="1.1" width="60">
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="#384348"
                                            fill-rule="evenodd">
                                            <g id="icon-shape">
                                                <path
                                                    d="M5.08261143,12.1593397 C4.54304902,12.6798471 3.80891237,13 3,13 C1.34314575,13 0,11.6568542 0,10 C0,8.34314575 1.34314575,7 3,7 C3.80891237,7 4.54304902,7.32015293 5.08261143,7.84066029 L14.0226687,3.37063167 C14.0077053,3.24918566 14,3.12549267 14,3 C14,1.34314575 15.3431458,0 17,0 C18.6568542,0 20,1.34314575 20,3 C20,4.65685425 18.6568542,6 17,6 C16.1910876,6 15.456951,5.67984707 14.9173886,5.15933971 L5.97733131,9.62936833 C5.99229467,9.75081434 6,9.87450733 6,10 C6,10.1254927 5.99229467,10.2491857 5.97733131,10.3706317 L14.9173886,14.8406603 C15.456951,14.3201529 16.1910876,14 17,14 C18.6568542,14 20,15.3431458 20,17 C20,18.6568542 18.6568542,20 17,20 C15.3431458,20 14,18.6568542 14,17 C14,16.8745073 14.0077053,16.7508143 14.0226687,16.6293683 L5.08261143,12.1593397 L5.08261143,12.1593397 Z"
                                                    id="Combined-Shape"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- comment section --}}
                @livewire('manage-comments', ['postId' => $post->id])

            </article>
        </main>
    </section>
</x-layout>
