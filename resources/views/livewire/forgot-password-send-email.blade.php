<div class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Esqueci Senha</h1>

            <p class="text-sm mt-6 text-gray-500">
                Preencha o campo abaixo com o seu email para receber o link de mudança de senha.
            </p>

            {{-- message if email was sent successfully --}}
            @if (session()->has('status'))
                <div class="mt-6 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- user input form  -->
            <form wire:submit.prevent="store" class="mt-6">
                @csrf

                <x-form.input name="email" type="email" id="Email" autocomplete="email" />

                <x-form.button>

                    <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Enviar</span>

                </x-form.button>

            </form>
        </x-panel>
    </main>
</div>
