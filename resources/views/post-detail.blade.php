<x-guest-layout>
    <x-slot name="header">
        {{ __('Simple Post') }}
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @if($post)
        <section class="prose p-6">
            <header>
                <h1><b>{{ $post->title }}</b></h1>
            </header>
            <main>{!! $post->content !!}</main>
        </section>
        @endif
    </div>
</x-guest-layout>

