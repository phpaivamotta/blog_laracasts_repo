<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Perfil</h1>

                <div class="">
                    <div class="text-center mt-8">
                        <img src="{{ isset($user->profile_pic) ? asset('storage/' . $user->profile_pic) : '/images/generic_profile_pic.png' }}"
                            alt="Foto de Perfil" class="profile rounded-xl">
                    </div>

                    <div class="py-6 space-y-4">
                        <p><strong>Nome:</strong> {{ $user->name }}</p>
                        <p><strong>Nome de Usuário:</strong> {{ $user->username }}</p>
                    </div>

                    @if (auth()->user() == $user)
                        <div>
                            <a href="/perfil/{{ $user->username }}/editar"
                                class="text-sm text-blue-300 hover:text-indigo-900">Editar Perfil</a>
                        </div>
                    @endif

                </div>

            </x-panel>
        </main>
    </section>
</x-layout>
