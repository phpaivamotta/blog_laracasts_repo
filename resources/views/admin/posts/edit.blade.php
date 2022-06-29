<x-layout>
    <x-setting :heading="'Editar Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" id="Título"/>
            <x-form.input name="slug" :value="old('slug', $post->slug)" id="Slug"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" id="Miniatura"/>
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail)  }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="excerpt" id="Excerto">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" id="Corpo">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.button> Atualizar </x-form.button>

        </form>
    </x-setting>
</x-layout>