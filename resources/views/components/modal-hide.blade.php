<div x-data="{ show: @entangle($attributes->wire('model')) }" x-show="show" @keydown.escape.window="show=false" style="display: none">
    <div class="fixed inset-0 bg-white opacity-60" @click="show = false"></div>

    <div class="bg-white border border-gray-400 shadow-sm p-4 lg:max-w-sm max-w-xs m-auto rounded-md fixed inset-0 h-56"
        x-show.transition="show">
        <div class="flex flex-col h-full justify-between">
            <header class="mb-2">
                <h3 class="font-bold text-lg">Tem certeza?</h3>
            </header>

            <main class="overflow-auto">

                @if ($currentPost->hide == 0)
                    <p>Este {{ $slot }} será ocultado. Pessoas com o link do post ainda poderão acessá-lo, mas
                        ele não aparecerá no feed.</p>
                @else
                    <p>Este {{ $slot }} ficará visível. Todos poderão ver o post no feed.</p>
                @endif

            </main>

            <footer class="mt-2">
                <button type="button"
                    class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-8 rounded-md text-white mr-2"
                    wire:click="toggleHide">Ok</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-4 rounded-md text-white"
                    wire:click="$set('modalHide', false)">Cancelar</button>
            </footer>
        </div>
    </div>
</div>
