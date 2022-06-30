<!doctype html>

<title>Poliana Porcelana Blog</title>
<link href="{{ asset('css/app.css')  }}" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/translations/pt.js"></script>
<!-- <script src="https://unpkg.com/turbolinks"></script> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/poliana_porcelana_logo_adobe_official.png" alt="Poliana Porcelana Logo" width="300">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                <a href="/sobre" class="text-sm font-bold transition-colors duration-300 hover:text-blue-500">Sobre</a>

                @auth
                <x-dropdown>

                    <x-slot name="trigger">
                        <button class="text-sm font-bold ml-6 transition-colors duration-300 hover:text-blue-500" name="trigger">Bem-vindo(a), {{ auth()->user()->name }}</button>
                    </x-slot>

                    @if(auth()->user()->can('admin'))
                    <x-dropdown-item href="/admin/painel" :active="request()->is('admin/painel')">Painel</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/criar" :active="request()->is('admin/posts/criar')">Novo Post</x-dropdown-item>
                    @endif


                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>

                </x-dropdown>

                @else
                <a href="/cadastro" class="text-sm font-bold ml-6 transition-colors duration-300 hover:text-blue-500">Cadastre-se</a>
                <a href="/login" class="text-sm font-bold ml-6 transition-colors duration-300 hover:text-blue-500">Login</a>
                @endauth

                <a href="#newsletter" class="bg-blue-500 ml-6 rounded-full text-sm font-semibold text-white py-3 px-5 transition-colors duration-300 hover:bg-blue-600">
                    Inscreva-se
                </a>

            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">

            <h5 class="text-3xl">Receba noticações de novos posts.</h5>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf

                        <div class="lg:py-3 lg:px-5 flex items-center">

                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>

                                <input id="email" name="email" type="text" placeholder="Seu endereço de email" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                <span class="text-red-500 text-xs"> {{ $message }} </span>
                                @enderror

                            </div>

                        </div>

                        <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Inscreava-se
                        </button>
                    </form>
                </div>
            </div>

            <!-- social media -->
            <div class="relative space-x-4 inline-flex mt-10 text-gray-700">
                <a href="https://twitter.com/PolianaPorce/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="hover:text-white" width="25">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/jessica-szklarz-a04a6984/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="hover:text-white" width="25">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                    </svg>
                </a>
            </div>

        </footer>
    </section>

    <x-flash />

</body>