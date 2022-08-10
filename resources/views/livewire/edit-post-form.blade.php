<div>
    <x-setting :heading="'Editar Post: ' . $originalTitle">
        <form wire:submit.prevent="update">

            <x-form.input name="title" :value="old('title', $title)" id="Título" />
            <x-form.input name="slug" :value="old('slug', $slug)" id="Slug" />

            <div class="flex mt-6">
                <div 
                    class="flex-1"
                    x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >

                    <!-- Progress Bar -->
                    <div x-show="isUploading" style="display:none">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>

                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $thumbnail)" id="Miniatura" />
                </div>

                @if (is_string($thumbnail))
                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="" class="rounded-xl ml-6"
                        width="100">
                @else
                    @if ($tempUrl)
                        <img src="{{ $tempUrl }}" alt="Miniatura" class="rounded-xl ml-6" width="100">
                    @endif
                @endif
            </div>

            <x-form.textarea name="excerpt" id="Excerto">{{ old('excerpt') }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="Corpo" />

                <div wire:ignore>
                    <textarea wire:model="body" class="border border-gray-400 p-2 w-full" name="body" id="body"> {{ old('body', $body) }} </textarea>
                </div>

                <x-form.error name="body" />
            </x-form.field>

            <x-form.button>
                <svg wire:loading wire:target="update" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>

                <span>
                    Atualizar
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
