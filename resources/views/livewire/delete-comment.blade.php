<div>
    @foreach ($comments as $comment)
        <form x-data>
            <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4" id="comments">

                <div class="flex-shrink-0">
                    <img src="{{ isset($comment->author->profile_pic)
                        ? asset('storage/' . $comment->author->profile_pic)
                        : '/images/generic_profile_pic.png' }}"
                        alt="Foto de Perfil" class="rounded-xl square">
                </div>

                <div>
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
                            wire:click="$set('showDeleteCommentModal', true)">Deletar</button>
                    @endadmin

                </div>

            </article>

            <x-modal wire:model.defer="showDeleteCommentModal" :comment="$comment">comentário</x-modal>

        </form>
    @endforeach
</div>
