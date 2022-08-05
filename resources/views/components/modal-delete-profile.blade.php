<div x-data="{ show: @entangle($attributes->wire('model')) }" x-show="show" @keydown.escape.window="show=false" style="display: none">
    <div class="fixed inset-0 bg-white opacity-60" @click="show = false"></div>

    <div class="bg-white border border-gray-400 shadow-sm p-4 max-w-3xl lg:max-w-sm m-auto rounded-md fixed inset-0 h-80 lg:h-48"
        x-show.transition="show">
        <div class="flex flex-col h-full justify-between">
            <header>
                <h3 class="font-bold text-5xl lg:text-lg">Tem certeza?</h3>
            </header>

            <main>
                <p class="lg:text-base text-4xl">Seu perfil não poderá ser recuperado.</p>
            </main>

            <footer>
                <button class="bg-blue-500 hover:bg-blue-600 lg:text-xs rounded-xl lg:rounded-md py-4 px-8 lg:py-2 lg:px-4 text-3xl text-white mr-4 lg:mr-2"
                    wire:click="destroy({{ $user->id }})">Deletar</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-600 lg:text-xs rounded-xl lg:rounded-md py-4 px-8 lg:py-2 lg:px-4 text-3xl text-white mr-4 lg:mr-2"
                    wire:click="$set('showConfirmDeleteModal', false)">Cancelar</button>
            </footer>
        </div>
    </div>
</div>
