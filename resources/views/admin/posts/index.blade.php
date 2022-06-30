<x-layout>
    <x-setting heading="Painel">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <tbody>
                                @foreach($posts as $post)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/posts/{{$post->slug}}">
                                            {{$post->title}}
                                        </a>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <div class="flex">
                                            <svg viewBox="-5 -5 30 30" width="20">
                                                <path fill="#add4f4" d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
                                            </svg>

                                            <p class="text-black ml-2">
                                                {{ $post->likeCount }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <div class="flex">
                                            
                                            <svg viewBox="0 0 20 20" version="1.1" width="20">
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="#add4f4" fill-rule="evenodd">
                                                    <g id="icon-shape">
                                                        <path d="M19.8005808,10 C17.9798698,6.43832409 14.2746855,4 10,4 C5.72531453,4 2.02013017,6.43832409 0.199419187,10 C2.02013017,13.5616759 5.72531453,16 10,16 C14.2746855,16 17.9798698,13.5616759 19.8005808,10 Z M10,14 C12.209139,14 14,12.209139 14,10 C14,7.790861 12.209139,6 10,6 C7.790861,6 6,7.790861 6,10 C6,12.209139 7.790861,14 10,14 Z M10,12 C11.1045695,12 12,11.1045695 12,10 C12,8.8954305 11.1045695,8 10,8 C8.8954305,8 8,8.8954305 8,10 C8,11.1045695 8.8954305,12 10,12 Z" id="Combined-Shape"></path>
                                                    </g>
                                                </g>
                                            </svg>

                                            <p class="text-black ml-2">
                                                {{ $visitors
                                                    ->where('post_id', $post->id)
                                                    ->unique('ip')
                                                    ->count()
                                                }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/admin/posts/{{$post->id}}/editar" class="text-blue-300 hover:text-indigo-900">Editar</a>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                        <form method="POST" action="/admin/posts/{{$post->id}}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-blue-300 hover:text-indigo-900">Deletar</button>


                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- about table row -->
                                <tr class="justify-between bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        <a href="/sobre">
                                            Sobre Poliana Porcelana
                                        </a>
                                    </td>

                                    <td></td>

                                    <td></td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/admin/sobre/editar" class="text-blue-300 hover:text-indigo-900">Editar</a>
                                    </td>

                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>