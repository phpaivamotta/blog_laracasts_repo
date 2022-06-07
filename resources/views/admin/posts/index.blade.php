<x-layout>
    <x-setting heading="Publish New Post">
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
                                            <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-300 hover:text-indigo-900">Edit</a>
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <!-- <a href="/admin/posts/{{$post->id}}/edit" class="text-blue-300 hover:text-indigo-900">Delete</a> -->
                                            <form method="POST" action="/admin/posts/{{$post->id}}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-blue-300 hover:text-indigo-900">Delete</button>


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
</x-layout>