<x-layout>
    <div class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Redefinir Senha</h1>

                <!-- user input form  -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <x-form.input name="email" type="email" id="Email" :value="old('email', $request->email)"/>

                    {{-- <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                            required autofocus />
                    </div> --}}

                    <!-- Password -->
                    <x-form.input name="password" type="password" id="Senha" />
                    
                    {{-- <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div> --}}

                    <!-- Confirm Password -->
                    <x-form.input name="password_confirmation" type="password" id="Confirmar Senha" />
{{--                     
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div> --}}

                    {{-- <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Reset Password') }}
                        </x-button>
                    </div> --}}

                    <x-form.button>
                        Redefinir
                    </x-form.button>
                </form>

            </x-panel>
        </main>
    </div>
</x-layout>
