@props(['post'])


<article {{ $attributes->merge(['class' => "mb-6 lg:mb-0 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl" ]) }}>
    <div class="lg:py-6 lg:px-5">
        <div>
            <a href="/posts/{{ $post->slug  }}">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="lg:rounded-xl w-full lg:max-w-[400px]">
            </a>
        </div>

        <div class="px-2 lg:px-0 mt-2 lg:mt-8 flex flex-col justify-between">
            <header>

                <div class="lg:mt-4">
                    <h1 class="text-2xl font-bold lg:font-normal lg:text-3xl">
                        <a href="/posts/{{$post->slug}}" class="transition-colors duration-300 hover:text-blue-500">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Publicado <time> {{$post->created_at->diffForHumans()}} </time>
                    </span>
                </div>
            </header>

            <div class="text-lg lg:text-sm mt-6 lg:mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-2 lg:mt-8">
                <div class="flex items-center text-sm">

                    <!-- Likes -->
                    <svg viewBox="-10 -10 40 40" class="w-12 lg:w-9">
                        <path fill="{{ $post->liked() ? '#add4f4' : '#384348' }}" d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"></path>
                    </svg>


                    <div class="ml-2 mr-2">
                        <h5 class="text-sm lg:text-sm text-gray-700 font-semibold">{{ $post->likeCount  }}</h5>
                    </div>

                    <!-- comments -->
                    <svg viewBox="-10 -10 40 40" version="1.1" class="w-12 lg:w-9">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="{{ auth()->id() && $post->comment->where('user_id', auth()->id())->count() ? '#add4f4' : '#384348' }}" fill-rule="evenodd">
                            <g id="icon-shape">
                                <path d="M14,11 L8.00585866,11 C6.89706013,11 6,10.1081436 6,9.00798298 L6,1.99201702 C6,0.900176167 6.89805351,0 8.00585866,0 L17.9941413,0 C19.1029399,0 20,0.891856397 20,1.99201702 L20,9.00798298 C20,10.0998238 19.1019465,11 17.9941413,11 L17,11 L17,14 L14,11 Z M14,13 L14,15.007983 C14,16.1081436 13.1029399,17 11.9941413,17 L6,17 L3,20 L3,17 L2.00585866,17 C0.898053512,17 0,16.0998238 0,15.007983 L0,7.99201702 C0,6.8918564 0.897060126,6 2.00585866,6 L4,6 L4,8.99349548 C4,11.2060545 5.78916089,13 7.99620271,13 L14,13 Z" id="Combined-Shape"></path>
                            </g>
                        </g>
                    </svg>

                    <div class="ml-2">
                        <h5 class="text-sm lg:text-sm text-gray-700 font-semibold">{{ $post->comment->count() }}</h5>
                    </div>

                </div>

            </footer>
        </div>
    </div>
</article>