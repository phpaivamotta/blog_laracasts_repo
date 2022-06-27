@props(['name', 'id'])

<x-form.field>
    <x-form.label name="{{$id}}" />

    <input class="border border-gray-400 p-2 w-full"
        name="{{$name}}"
        id="{{$name}}"
        {{ $attributes(['value' => old($name) ])  }}
    >

    <x-form.error name="{{$name}}"/>
</x-form.field>