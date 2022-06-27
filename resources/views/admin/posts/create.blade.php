<x-layout>
    <x-setting heading="Publicar Novo Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" id="Título" />
            <x-form.input name="slug" id="Slug" />
            <x-form.input name="thumbnail" type="file" id="Miniatura" />
            <x-form.textarea name="excerpt" id="Excerto" />
            <x-form.textarea name="body" rows="12" id="Corpo" />

            <x-form.button> Publicar </x-form.button>

        </form>
    </x-setting>
</x-layout>