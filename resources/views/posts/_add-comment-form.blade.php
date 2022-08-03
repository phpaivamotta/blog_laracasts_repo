@auth
    <x-panel>
        <form wire:submit.prevent="postComment">
            @csrf

            <header class="flex items-center">

                <img src="{{ isset(auth()->user()->profile_pic)
                    ? asset('storage/' . auth()->user()->profile_pic)
                    : '/images/generic_profile_pic.png' }}"
                    alt="Foto de Perfil" class="rounded-xl lg:w-16 lg:h-16 w-32 h-32">


                <h2 class="text-3xl lg:text-base ml-4"> Participe da discussão. </h2>
            </header>

            <div class="mt-6">
                <textarea wire:model.defer="body" id="comment" name="body"
                    class="w-full text-3xl lg:text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Digite seu comentário aqui." required></textarea>

                @error('body')
                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6">

                <x-form.field>
                    <button type="submit"
                        class="flex items-center bg-blue-400 text-white rounded-xl lg:rounded py-4 px-8 lg:py-2 lg:px-4 hover:bg-blue-500 disabled:opacity-60">
                        <svg wire:loading wire:target="postComment" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span class="lg:text-base text-4xl">
                            Postar
                        </span>
                    </button>
                </x-form.field>

            </div>

        </form>
    </x-panel>
@else
    <p class="text-3xl lg:text-lg font-semibold">
        <a href="/cadastro" class="hover:underline text-blue-500">Cadastre-se</a> ou faça o <a href="/login"
            class="hover:underline text-blue-500">login</a> para amar ou deixar um comentário.
    </p>
@endauth
