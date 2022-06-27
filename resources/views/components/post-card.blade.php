@props(['post'])


<article {{ $attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl" ]) }}>
    <div class="py-6 px-5">
        <div>
            <a href="/posts/{{ $post->slug  }}">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
            </a>
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Publicado <time> {{$post->created_at->diffForHumans()}} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">

                    <a href="/?autor={{$post->author->username}}">
                        <img src="{{ isset($post->author->profile_pic) ? 
                        asset('storage/' . $post->author->profile_pic) :
                        '/images/generic_profile_pic.png' }}" alt="" width="60" height="60" class="rounded-xl">
                    </a>

                    <div class="ml-3">
                        <h5 class="font-bold"><a href="/?autor={{$post->author->username}}">{{$post->author->name}}</a></h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{$post->slug}}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Leia Mais</a>
                </div>
            </footer>
        </div>
    </div>
</article>