<div>
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
                        <div class="flex flex-col space-y-1">
                            <a href="/perfil/{{ $user->username }}/editar"
                                class="text-sm text-blue-300 hover:text-indigo-900">Editar Perfil</a>

                            <button type="button" wire:click="confirmDelete" class="text-sm text-red-300 text-left hover:text-red-900">Deletar
                                Perfil</button>
                        </div>
                    @endif

                </div>

            </x-panel>
        </main>
    </section>

    <x-modal-delete-profile wire:model.defer="showConfirmDeleteModal" :user="$user"/>

</div>
