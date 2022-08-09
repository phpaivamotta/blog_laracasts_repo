<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 mb-10 lg:mt-20 space-y-6">

        @if ($posts->count())
            <x-posts-grid :posts="$posts" />

            {{ $posts->links() }}
        @else
            <p class="text-center">Nenhum post ainda, por favor cheque mais tarde.</p>
        @endif
    
    </main>

</x-layout>