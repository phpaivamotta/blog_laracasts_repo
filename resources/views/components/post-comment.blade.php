@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4" id="comments">

    <div class="flex-shrink-0">
        <!-- change -->
        <img src="{{ isset($comment->author->profile_pic)
            ? asset('storage/' . $comment->author->profile_pic)
            : '/images/generic_profile_pic.png' }}"
            alt="Foto de Perfil" class="rounded-xl square">
        <!-- end change -->
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
                <form method="POST" action="/admin/comentários/{{ $comment->id }}">
                    @csrf
                    @method('DELETE')

                    <button class="text-xs text-blue-300 hover:text-indigo-900">Deletar</button>
                </form>
        @endadmin

    </div>

</article>
