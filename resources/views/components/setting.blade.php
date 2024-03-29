@props(['heading'])

<section class="py-8 max-w-5xl">
    <h1 class="text-lg font-bold mb-8 lg:ml-0 ml-2 mr-2 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="lg:flex">
        <aside class="lg:mb-0 mb-6 lg:ml-0 ml-2 lg:w-24 w-48 mr-2">
            <h4 class="font-semibold mb-4">Links</h4>

            <div class="flex items-center lg:block">
                <div>
                    <a href="/admin/painel"
                        class="{{ request()->is('admin/painel') || request()->is('livewire/message/manage-posts') ? 'text-blue-500' : '' }} text-left">Posts</a>
                </div>

                <div class="flex lg:hidden w-px h-4 mx-2 bg-black"></div>

                <div>
                    <a href="/admin/painel/usuários"
                        class="{{ request()->is('admin/painel/usuários') || request()->is('livewire/message/delete-user') ? 'text-blue-500' : '' }} text-left">Usuários</a>
                </div>
            </div>

        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
