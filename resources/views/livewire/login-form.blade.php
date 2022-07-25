<div class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Login</h1>

            <!-- user input form  -->
            <form wire:submit.prevent="store" method="POST" action="/login" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" id="Email" autocomplete="email" />
                <x-form.input name="password" type="password" autocomplete="new-password" id="Senha" />

                <a href="/esqueci-senha">
                    <p class="text-xs text-blue-500 hover:text-blue-900 underline mb-4">Esqueceu sua senha?</p>
                </a>

                <x-form.button>

                    <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Login</span>

                </x-form.button>

            </form>
        </x-panel>
    </main>
</div>
