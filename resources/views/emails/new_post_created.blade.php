@component('mail::message')
# Venha ler o meu novo post!

@component('mail::panel')
# {{ $post->title }}

{{ $post->excerpt }}
@endcomponent

@component('mail::button', ['url' => url("/posts/{$post->slug}")])
Ler Post
@endcomponent

Obrigada,<br>
{{ config('app.name') }}
@endcomponent
