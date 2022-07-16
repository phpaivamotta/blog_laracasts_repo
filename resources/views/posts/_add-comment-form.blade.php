@auth
    <x-panel>
        <form wire:submit.prevent="postComment" method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">

                <img src="{{ isset(auth()->user()->profile_pic)
                    ? asset('storage/' . auth()->user()->profile_pic)
                    : '/images/generic_profile_pic.png' }}"
                    alt="Foto de Perfil" class="rounded-xl square">


                <h2 class="ml-4"> Participe da discussão. </h2>
            </header>

            <div class="mt-6">
                <textarea wire:model.defer="body" id="comment" name="body" class="w-full text-sm focus:outline-none focus:ring"
                    rows="5" placeholder="Digite seu comentário aqui." required></textarea>

                @error('body')
                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6">
                <x-form.button>
                    <svg wire:loading wire:target="postComment" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>
                        Postar
                    </span>
                </x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/cadastro" class="hover:underline text-blue-500">Cadastre-se</a> ou faça o <a href="/login"
            class="hover:underline text-blue-500">login</a> para amar ou deixar um comentário.
    </p>
@endauth
