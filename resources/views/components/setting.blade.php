@props(['heading'])

<section class="py-8 max-w-5xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>

            <div>
                <a href="/admin/painel" class="{{ request()->is('admin/painel') ? 'text-blue-500' : ''}} text-left">Todos os Posts</a>
            </div>

            <div>
                <a href="/admin/posts/criar" class="{{ request()->is('admin/posts/criar') ? 'text-blue-500' : ''}} text-left">Novo Post</a>
            </div>

        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>