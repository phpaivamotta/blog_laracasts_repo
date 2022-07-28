<div class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Redefinir Senha</h1>

            <!-- user input form  -->
            <form wire:submit.prevent="store" method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input wire:model="token" name="token" type="hidden" value="{{ $token }}">

                <!-- Email Address -->
                <x-form.input name="email" type="email" id="Email" :value="old('email', $email)" />

                <!-- Password -->
                <x-form.input name="password" type="password" id="Senha" />

                <!-- Confirm Password -->
                <x-form.input name="password_confirmation" type="password" id="Confirmar Senha" />

                <x-form.button>
                    <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Redefinir</span>
                </x-form.button>
            </form>

        </x-panel>
    </main>
</div>
