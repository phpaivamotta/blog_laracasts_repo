<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login</h1>

                <!-- user input form  -->
                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="username" type="text" id="Nome de Usuário" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password" id="Senha"/>

                    <x-form.button>Login</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>