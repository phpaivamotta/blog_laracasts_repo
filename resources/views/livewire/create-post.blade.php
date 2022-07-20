<div>
    <x-setting heading="Publicar Novo Post">
        <form wire:submit.prevent="store">

            <x-form.input name="title" id="Título" />
            <x-form.input name="slug" id="Slug" />

            {{-- Thumbnail: how I might handle it --}}
            @if ($thumbnail)
                @if ($tempUrl)
                    <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.input name="thumbnail" type="file" id="Miniatura" />
                        </div>

                        <img src="{{ $tempUrl }}" alt="Miniatura" class="rounded-xl ml-6" width="100">
                    </div>
                @else
                    <x-form.input name="thumbnail" type="file" id="Miniatura" />
                @endif
            @else
                <x-form.input name="thumbnail" type="file" id="Miniatura" />
            @endif
            {{-- end Thumbnail: how I might handle it --}}

            <x-form.textarea name="excerpt" id="Excerto" />

            <x-form.field>
                <x-form.label name="Corpo" />

                <div wire:ignore>
                    <textarea wire:model="body" class="border border-gray-400 p-2 w-full" name="body" id="body"> {{ $slot ?? old('body') }} </textarea>
                </div>

                <x-form.error name="body" />
            </x-form.field>

            <x-form.button>
                <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>

                <span>
                    Publicar
                </span>
            </x-form.button>

        </form>
    </x-setting>

</div>

{{-- script for loading ckeditor --}}
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('body', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
