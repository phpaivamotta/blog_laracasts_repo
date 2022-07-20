@auth
    
        <button class="flex items-center" wire:click="like({{ $post->id }})">
            <svg viewBox="-10 -10 40 40" width="60">
                <path fill="{{ $post->liked() ? '#add4f4' : '#384348' }}"
                    d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z">
                </path>
            </svg>
        </button>
        
    <span class="text-sm text-gray-700 font-semibold"> {{ $post->likeCount }} </span>

@else

    <svg viewBox="-10 -10 40 40" width="60">
        <path fill="#384348"
            d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
    </svg>

    <span class="text-sm text-gray-700 font-semibold"> {{ $post->likeCount }} </span>

@endauth
