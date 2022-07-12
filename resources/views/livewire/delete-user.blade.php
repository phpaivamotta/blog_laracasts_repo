<div>
    <x-setting heading="Painel: Usuários">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-sm text-gray-900 font-light px-3 py-4 whitespace-nowrap">
                                            <a href="/perfil/{{ $user->username }}">{{ $user->username }}</a>
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-3 py-4 whitespace-nowrap">
                                            <div class="flex">
                                                <svg viewBox="-5 -5 30 30" version="1.1" width="20">
                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="#add4f4"
                                                        fill-rule="evenodd">
                                                        <g id="icon-shape">
                                                            <path
                                                                d="M14,11 L8.00585866,11 C6.89706013,11 6,10.1081436 6,9.00798298 L6,1.99201702 C6,0.900176167 6.89805351,0 8.00585866,0 L17.9941413,0 C19.1029399,0 20,0.891856397 20,1.99201702 L20,9.00798298 C20,10.0998238 19.1019465,11 17.9941413,11 L17,11 L17,14 L14,11 Z M14,13 L14,15.007983 C14,16.1081436 13.1029399,17 11.9941413,17 L6,17 L3,20 L3,17 L2.00585866,17 C0.898053512,17 0,16.0998238 0,15.007983 L0,7.99201702 C0,6.8918564 0.897060126,6 2.00585866,6 L4,6 L4,8.99349548 C4,11.2060545 5.78916089,13 7.99620271,13 L14,13 Z"
                                                                id="Combined-Shape"></path>
                                                        </g>
                                                    </g>
                                                </svg>

                                                <p class="text-black ml-2">
                                                    {{ $user->comments->count() }}
                                                </p>
                                            </div>
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-3 py-4 whitespace-nowrap">
                                            <div class="flex">
                                                <svg viewBox="-5 -5 30 30" width="20">
                                                    <path fill="#add4f4"
                                                        d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z">
                                                    </path>
                                                </svg>

                                                <p class="text-black ml-2">
                                                    {{ $user->likes->count() }}
                                                </p>
                                            </div>
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-3 py-4 whitespace-nowrap">

                                            <form x-data>
                                                <button type="button" class="text-blue-300 hover:text-indigo-900"
                                                    wire:click="confirmDelete({{ $user }})">Deletar</button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>

    <x-modal wire:model.defer="modal" :object="$user">usuário <strong>({{ $currentUser->username }})</strong>
    </x-modal>
</div>
