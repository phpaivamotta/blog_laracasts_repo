<x-layout>
    <x-setting :heading="'Editar: Sobre Poliana Porcelana'">
        <form method="POST" action="/admin/sobre">
            @csrf
            @method('PATCH')

            <x-form.textarea name="body" id="Corpo">{{ old('body', $about->body) }}</x-form.textarea>

            <x-form.button> Atualizar </x-form.button>

        </form>
    </x-setting>
</x-layout>