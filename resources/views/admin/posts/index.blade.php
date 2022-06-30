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
                                                <path fill="#ea4f4f" stroke="black" stroke-width="1.5" d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
                                            </svg>

                                            <p class="text-black ml-2">
                                                {{ $post->likeCount }}
                                            </p>
                                        </div>
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <div class="flex">
                                            <img src="/images/eye_icon_image_blog_laracasts.png" alt="eye logo" width="19" height="19">

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