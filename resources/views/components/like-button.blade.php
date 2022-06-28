@auth
<div class="flex mt-8" id="likes">
    <form method="POST" action="/posts/{{ $post->slug  }}/amar">
        @csrf
        <div class="flex items-center text-white px-1">

            <button type="submit" class="flex items-center">
                <svg viewBox="-10 -10 40 40" class="" width="60">
                    <path fill="{{ $post->liked() ? '#ea4f4f' : 'white'  }}" stroke="black" stroke-width="1.5" d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
                </svg>
            </button>

            <span class="text-lg text-black"> {{ $post->likeCount }} </span>
        </div>
    </form>
</div>
@endauth