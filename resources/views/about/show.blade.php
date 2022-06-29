<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

                    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Foto de Perfil" class="rounded-xl">

                    <div class="flex items-center text-lg mt-4">

                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{$user->name}}</h5>
                        </div>

                    </div>

                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{ session('blog_url') }}" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Voltar aos Posts
                        </a>

                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        Sobre Poliana Porcelana
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $user->about->body !!}
                    </div>

                </div>

            </article>
        </main>
    </section>
</x-layout>