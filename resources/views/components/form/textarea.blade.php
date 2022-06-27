@props(['name', 'id'])

<x-form.field>
    <x-form.label name="{{$id}}" />

    <textarea class="border border-gray-400 p-2 w-full" name="{{$name}}" id="{{$name}}" required {{$attributes}}> {{ $slot ?? old($name) }} </textarea>

    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                language: 'pt'
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <x-form.error name="{{$name}}" />

</x-form.field>