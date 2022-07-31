@props(['trigger'])

<div x-data="{show:false}" @mouseover.away="show=false" class="relative">

    <div @mouseover="show = true">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-200 overflow-auto rounded-xl z-50 max-h-52" style="display:none">
        {{ $slot }}
    </div>
</div>