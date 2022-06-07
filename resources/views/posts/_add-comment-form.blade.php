@auth
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <header class="flex items-center">
                <!-- <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full"> -->
                <img src="{{ asset('storage/' . auth()->user()->profile_pic) }}"  alt="Profile Picture" width="40" height="40" class="rounded-full"> 
                <h2 class="ml-4"> Join the discussion. </h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Type your comment here." required></textarea>

                @error('body')
                    <span class="text-red-500 text-xs"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6">
                <x-form.button>Post</x-form.button>
            </div>

        </form>
    </x-panel> 
@else 
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">login</a> to leave a comment.
    </p>   
@endauth
