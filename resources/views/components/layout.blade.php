<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1T1RFPWDJK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1T1RFPWDJK');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.4">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Poliana Porcelana Blog</title>
    <link rel="icon" href="/images/logo_blog_laracasts_nuvem.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/translations/pt.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-3 lg:px-6 py-8 flex flex-col min-h-screen">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo_blog_laracasts_nuvem.png" alt="Poliana Porcelana Logo" class="w-24 lg:w-20">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                <a href="/sobre"
                    class="text-2xl lg:text-sm font-semibold transition-colors duration-300 hover:text-blue-500">Sobre</a>

                @auth
                    <x-dropdown>

                        <x-slot name="trigger">
                            <button class="text-2xl lg:text-sm font-semibold ml-6 transition-colors duration-300 hover:text-blue-500"
                                name="trigger">Bem-vindo(a), {{ auth()->user()->name }}</button>
                        </x-slot>

                        @admin
                            <x-dropdown-item href="/admin/painel" :active="request()->is('admin/painel')">Painel</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/criar" :active="request()->is('admin/posts/criar')">Novo Post</x-dropdown-item>
                        @endadmin

                        <x-dropdown-item href="/perfil/{{ auth()->user()->username }}" :active="request()->is('perfil/editar')">Perfil
                        </x-dropdown-item>

                        <x-dropdown-item href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>

                    </x-dropdown>
                @else
                    <a href="/cadastro"
                        class="text-2xl lg:text-sm font-semibold ml-6 transition-colors duration-300 hover:text-blue-500">Cadastre-se</a>
                    <a href="/login"
                        class="text-2xl lg:text-sm font-semibold ml-6 transition-colors duration-300 hover:text-blue-500">Login</a>
                @endauth

                <a href="#newsletter"
                    class="bg-blue-500 ml-6 rounded-full text-2xl lg:text-sm font-semibold text-white py-5 px-8 lg:py-3 lg:px-5 transition-colors duration-300 hover:bg-blue-600">
                    Inscreva-se
                </a>

            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-auto">

            <h5 class="text-5xl lg:text-3xl">Receba notificações de novos posts.</h5>

            {{-- email input box --}}
            <div class="mt-10">
                <div class="inline-block mx-auto bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="flex text-sm">
                        <input type="hidden" name="_token" value="tIyC58JN1ltk9qMOdTbl6tZblaga9bBgnXhd3So7">
                        <div class="py-3 px-5 flex items-center">

                            <label for="email" class="inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter" class="w-10 lg:w-5">
                            </label>

                            <div>

                                <input id="email" name="email" type="text" placeholder="Seu endereço de email"
                                    class="bg-transparent py-0 pl-4 text-2xl lg:text-sm focus-within:outline-none">


                            </div>

                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-0 ml-3 rounded-full text-2xl lg:text-sm font-semibold text-white py-5 px-8 lg:py-3 lg:px-8">
                            Inscreva-se
                        </button>
                    </form>
                </div>
            </div>
            {{-- email input box --}}

            <!-- social media -->
            <div class="relative space-x-4 inline-flex mt-10 text-gray-700">
                <a href="https://twitter.com/PolianaPorce/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="hover:text-blue-500 w-10 lg:w-6">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path fill="currentColor"
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/jessica-szklarz-a04a6984/" target="_blank">
                    <svg viewBox="0 3 25 25" class="hover:text-blue-500 w-16 lg:w-10">
                        <path fill="currentColor"
                            d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="mt-6">
                <p class="text-xl lg:text-xs text-gray-700">
                    © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                </p>
            </div>

        </footer>
    </section>

    <x-flash />

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
</body>

</html>
