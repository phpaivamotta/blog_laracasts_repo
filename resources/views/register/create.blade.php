<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Cadastre-se</h1>

                <!-- user input form  -->
                <form method="POST" action="/cadastro" enctype="multipart/form-data" class="mt-10">
                    @csrf

                    <x-form.input name="name" type="text" id="Nome"/>
                    <x-form.input name="username" type="text" id="Nome de Usuário"/>
                    <x-form.input name="email" type="email" id="Email"/>
                    <x-form.input name="profile_pic" type="file" id="Foto de Perfil (Opcional)"/>
                    <x-form.input name="password" type="password" id="Senha"/>

                    <x-form.button>Cadastrar</x-form.button>

                </form>  
            </x-panel>  
        </main>
    </section>
</x-layout>