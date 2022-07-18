<div class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Cadastre-se</h1>

            <form wire:submit.prevent="store" method="POST" action="/cadastro" enctype="multipart/form-data" class="mt-10">
                @csrf

                <x-form.input name="name" type="text" id="Nome" />
                <x-form.input name="username" type="text" id="Nome de Usuário" />
                {{-- user profile pic --}}
                <div class="flex items-center mt-6 mb-2">
                    <div class="flex-1">

                        <x-form.field>
                            <x-form.label name="Foto de Perfil (Opcional)" />

                            <input type="file" wire:model="profile_pic" class="border border-gray-400 p-2 w-full"
                                name="profile_pic" id="{{ $profilePicId }}">

                            @if ($profile_pic)
                                <x-form.error name="profile_pic" />
                            @endif
                        </x-form.field>

                    </div>

                    <button type="button">
                        <svg wire:click="removeSelectedProfilePic" viewBox="-5 -5 30 30" width="30" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="black" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <polygon id="Combined-Shape"
                                        points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644">
                                    </polygon>
                                </g>
                            </g>
                        </svg>
                    </button>


                    @if ($profile_pic)
                        @php
                            try {
                                $tempUrl = $profile_pic->temporaryUrl();
                            } catch (\Exception $e) {
                                $tempUrl = '/images/generic_profile_pic.png';
                            }
                        @endphp

                        <img src="{{ $tempUrl }}" alt="Foto de Perfil" class="rounded-xl ml-6 square"
                            width="100">
                    @else
                        <img src="/images/generic_profile_pic.png" alt="Foto de Perfil" class="rounded-xl ml-6 square"
                            width="100">
                    @endif

                </div>
                {{-- end user profile pic --}}
                <x-form.input name="password" type="password" id="Senha" />

                <x-form.button>

                    <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Cadastrar</span>

                </x-form.button>

            </form>
        </x-panel>
    </main>
</div>
