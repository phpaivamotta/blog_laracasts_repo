@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">

                <img src="{{ isset(auth()->user()->profile_pic)
                    ? asset('storage/' . auth()->user()->profile_pic)
                    : '/images/generic_profile_pic.png' }}"
                    alt="Foto de Perfil" class="rounded-xl square">


                <h2 class="ml-4"> Participe da discussão. </h2>
            </header>

            <div class="mt-6">
                <textarea id="comment" name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Digite seu comentário aqui." required></textarea>

                @error('body')
                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6">
                <x-form.button>Postar</x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/cadastro" class="hover:underline text-blue-500">Cadastre-se</a> ou faça o <a href="/login"
            class="hover:underline text-blue-500">login</a> para amar ou deixar um comentário.
    </p>
@endauth
