<div class="col-span-8 col-start-5 mt-8 space-y-5">

    {{-- comment form --}}
    @include('posts._add-comment-form')

    {{-- list of comments --}}
    @foreach ($comments as $comment)
        <form x-data>
            <article class="flex bg-gray-100 mx-2 lg:mx-0 border border-gray-200 p-6 rounded-xl space-x-4 mt-2" id="comments">

                <div class="flex-shrink-0">
                    <img src="{{ isset($comment->author->profile_pic)
                        ? asset('storage/' . $comment->author->profile_pic)
                        : '/images/generic_profile_pic.png' }}"
                        alt="Foto de Perfil" class="rounded-xl square">
                </div>

                <div class="overflow-auto">
                    <header class="mb-4">
                        <h3 class="font-bold">{{ $comment->author->username }}</h3>
                        <p class="text-xs">
                            Posted
                            <time>{{ $comment->created_at->diffForHumans() }}</time>
                        </p>
                    </header>

                    <p>
                        {{ $comment->body }}
                    </p>

                    @admin
                        <button type="button" class="text-xs text-blue-300 hover:text-indigo-900"
                            wire:click="confirmDelete({{ $comment }})">Deletar</button>
                    @endadmin

                </div>

            </article>



        </form>
    @endforeach

    @if ($comments->count())
        <x-modal-delete wire:model.defer="modalDelete" :object="$comment">comentário</x-modal-delete>
    @endif

</div>
