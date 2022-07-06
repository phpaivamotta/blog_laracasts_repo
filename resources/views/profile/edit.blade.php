<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Editar Perfil</h1>

                <!-- user input form  -->
                <form method="POST" action="/perfil/{{ $user->username }}" enctype="multipart/form-data" class="mt-10">
                    @csrf
                    @method('PATCH')

                    <x-form.input name="name" type="text" :value="old('name', $user->name)" id="Nome" />
                    <x-form.input name="username" type="text" :value="old('username', $user->username)" id="Nome de Usuário" />


                    <div class="flex mt-6 mb-2">
                        <div class="flex-1">
                            <x-form.input name="profile_pic" type="file" :value="old('profile_pic', $user->profile_pic)" id="Foto de Perfil (Opcional)" />

                            <input type="checkbox" id="nopic" name="nopic" value="bool">
                            <label for="nopic">Deletar foto de perfil</label><br>
                        </div>

                        <img src="{{ isset($user->profile_pic) ? 
                         asset('storage/' . $user->profile_pic) : 
                         '/images/generic_profile_pic.png'  }}" alt="" class="rounded-xl ml-6 mt-4 square" width="100">
                    </div>

                    <x-form.button>Editar</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>