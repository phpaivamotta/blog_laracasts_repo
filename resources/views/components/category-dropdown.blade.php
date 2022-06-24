<x-dropdown>

    <x-slot name='trigger'>

        <button class='py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex'>
            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categorias'}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>

    </x-slot>

    <x-dropdown-item href="/?{{http_build_query(request()->except('category', 'page'))}}" :active="request()->fullUrlIs('http://localhost')">Todas
    </x-dropdown-item>

    @foreach ($categories as $category)
        @php
            $categoryUrl = 'http://localhost/?category=' . $category->slug;
        @endphp
        
        <x-dropdown-item href="/?categoria={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}" :active="request()->fullUrlIs($categoryUrl)">
        {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>