@props(['name', 'id'])

<x-form.field>
    <x-form.label name="{{$id}}"/>

    <textarea class="border border-gray-400 p-2 w-full"
        name="{{$name}}"
        id="{{$name}}"
        required
        {{$attributes}}
    > {{ $slot ?? old($name) }} </textarea>

    <x-form.error name="{{$name}}"/>

</x-form.field>