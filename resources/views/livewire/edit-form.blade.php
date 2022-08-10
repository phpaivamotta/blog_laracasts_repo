<div class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <h1 class="text-center font-bold text-xl">Editar Perfil</h1>

            <!-- user input form  -->
            <form wire:submit.prevent="update" class="mt-10">

                <x-form.input name="name" type="text" :value="old('name', $name)" id="Nome" />
                <x-form.input name="email" type="email" :value="old('email', $email)" id="Email" />
                <x-form.input name="username" type="text" :value="old('username', $username)" id="Nome de Usuário" />

                {{-- user profile pic --}}
                <div class="lg:flex lg:items-center mt-6 mb-2">
                    <div 
                        class="flex-1"
                        x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >

                        <!-- Progress Bar -->
                        <div x-show="isUploading" style="display:none">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>

                        <x-form.field>
                            <x-form.label name="Foto de Perfil (Opcional)" />

                            <input type="file" wire:model="profile_pic" class="border border-gray-400 p-2 w-full"
                                name="profile_pic" id="{{ $profilePicId }}">

                            @if ($profile_pic)
                                <x-form.error name="profile_pic" />
                            @endif
                        </x-form.field>

                    </div>

                    <div class="flex items-center mb-6 lg:mb-0">
                        <button type="button">
                            <svg wire:click="removeSelectedProfilePic" viewBox="-5 -5 30 30" class="w-11 lg:w-8"
                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
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

                            {{-- check to see if $profile_pic is a string because if it is, then it has already been stored into the storage public/storage folder --}}
                            @if (is_string($profile_pic))
                                <img src="{{ asset('storage/' . $profile_pic) }}" alt="Foto de Perfil"
                                    class="rounded-xl ml-6 w-32 h-32 lg:w-16 lg:h-16" width="100">
                            @else
                                @php
                                    try {
                                        $tempUrl = $profile_pic->temporaryUrl();
                                    } catch (\Exception $e) {
                                        $tempUrl = '/images/generic_profile_pic.png';
                                    }
                                @endphp

                                <img src="{{ $tempUrl }}" alt="Foto de Perfil"
                                    class="rounded-xl ml-6 w-32 h-32 lg:w-16 lg:h-16" width="100">
                            @endif
                        @else
                            <img src="/images/generic_profile_pic.png" alt="Foto de Perfil"
                                class="rounded-xl ml-6 w-32 h-32 lg:w-16 lg:h-16" width="100">
                        @endif

                    </div>

                </div>
                {{-- end user profile pic --}}

                <x-form.button>
                    <svg wire:loading wire:target="update" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Editar</span>
                </x-form.button>

            </form>
        </x-panel>
    </main>
</div>
