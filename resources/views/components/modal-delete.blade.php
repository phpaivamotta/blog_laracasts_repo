<div x-data="{ show: @entangle($attributes->wire('model')) } " x-show="show" @keydown.escape.window="show=false" style="display: none">
    <div class="fixed inset-0 bg-white opacity-60" @click="show = false"></div>

    <div class="bg-white border border-gray-400 shadow-sm p-4 lg:max-w-sm max-w-xs m-auto rounded-md fixed inset-0 h-48" x-show.transition="show">
        <div class="flex flex-col h-full justify-between">
            <header>
                <h3 class="font-bold text-lg">Tem certeza?</h3>
            </header>

            <main>
                <p>Este {{ $slot }} não poderá ser recuperado.</p>
            </main>

            <footer>
                <button class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-4 rounded-md text-white mr-2"
                    wire:click="destroy({{ $object->id }})">Deletar</button>
                <button type="button"
                    class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-4 rounded-md text-white" wire:click="$set('modalDelete', false)">Cancelar</button>
            </footer>
        </div>
    </div>
</div>
