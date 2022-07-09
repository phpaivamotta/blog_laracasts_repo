<div x-data="{ show: false }" x-show="show" @hashchange.window="(location.hash == '#modal') ? show = true : show = false;"
    style="display: none;">
    <div class="fixed inset-0 bg-white opacity-60"></div>

    <div class="bg-white border border-gray-400 shadow-sm p-4 max-w-sm m-auto rounded-md fixed inset-0 h-48">
        <div class="flex flex-col h-full justify-between">
            <header>
                <h3 class="font-bold text-lg">Tem certeza?</h3>
            </header>

            <main>
                <p>Este {{ $slot }} não poderá ser recuperado.</p>
            </main>

            <footer>
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-4 rounded-md text-white mr-2" @click="document.querySelector('#delete-comment-form').submit()">Deletar</button>
                <a href="#cancelar"
                    class="bg-blue-500 hover:bg-blue-600 text-xs py-2 px-4 rounded-md text-white">Cancelar</a>
            </footer>
        </div>
    </div>
</div>
