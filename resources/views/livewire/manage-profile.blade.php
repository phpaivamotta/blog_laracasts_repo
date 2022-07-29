<div>
    <section class="px-6 py-8">
        <main class="max-w-lg drop-shadow-md mx-auto mt-10">
            <div class="border border-gray-200 pb-6 rounded-xl">
                <div>
                    <div class="bg-pink-200 rounded-t-xl">
                        <div class="flex justify-center pt-10 pb-4">
                            <img src="{{ isset($user->profile_pic) ? asset('storage/' . $user->profile_pic) : '/images/generic_profile_pic.png' }}"
                                alt="Foto de Perfil" class="profile rounded-xl">
                        </div>

                        <h1 class="font-semibold text-gray-800 pb-3 text-center text-2xl">{{ $user->name }}</h1>
                    </div>

                    <div class="py-6 mt-6 ml-16 space-y-4">

                        {{-- email --}}
                        <div class="flex items-center space-x-2">
                            <svg viewBox="-10 -10 40 40" width="50" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="icon-shape">
                                        <path fill="#384348"
                                            d="M14.8780488,10.097561 L20,14 L20,16 L13.627451,11.0980392 L10,14 L6.37254902,11.0980392 L0,16 L0,14 L5.12195122,10.097561 L0,6 L0,4 L10,12 L20,4 L20,6 L14.8780488,10.097561 Z M18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 Z"
                                            id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>

                            <p>{{ $user->email }}</p>
                        </div>

                        {{-- username --}}
                        <div class="flex items-center space-x-2">
                            <svg viewBox="-10 -10 40 40" width="50" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="icon-shape">
                                        <path fill="#384348"
                                            d="M4.99999861,5.00218626 C4.99999861,2.23955507 7.24419318,0 9.99999722,0 C12.7614202,0 14.9999958,2.22898489 14.9999958,5.00218626 L14.9999958,6.99781374 C14.9999958,9.76044493 12.7558013,12 9.99999722,12 C7.23857424,12 4.99999861,9.77101511 4.99999861,6.99781374 L4.99999861,5.00218626 Z M1.11022272e-16,16.6756439 C2.94172855,14.9739441 6.3571245,14 9.99999722,14 C13.6428699,14 17.0582659,14.9739441 20,16.6756471 L19.9999944,20 L0,20 L1.11022272e-16,16.6756439 Z"
                                            id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>

                            <p>{{ $user->username }}</p>
                        </div>

                    </div>

                    @if (auth()->user() == $user)
                        <div class="flex mt-6 mb-4 justify-center items-center space-x-6">
                            <a href="/perfil/{{ $user->username }}/editar"
                                class="flex items-center bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 disabled:opacity-60">Editar</a>

                            <button type="button" wire:click="confirmDelete"
                                class="flex items-center bg-red-600 text-white rounded py-2 px-4 hover:bg-red-700 disabled:opacity-60">Deletar</button>
                        </div>
                    @endif

                </div>

            </div>
        </main>
    </section>

    <x-modal-delete-profile wire:model.defer="showConfirmDeleteModal" :user="$user" />

</div>
