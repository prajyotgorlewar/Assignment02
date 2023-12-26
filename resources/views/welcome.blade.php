<x-guest-layout>
    <x-slot name="header">
        {{ __('Our Articles') }}
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @if($posts)
            @foreach ($posts as $post)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="https://placekitten.com/800/600" alt="Article Image" class="mb-4 rounded-lg">
                    <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-700 mb-4">{{ $post->content }}</p>
                    <a href="{{ route('post-show', $post->id)}}" class="text-blue-500 hover:underline">Read more</a>
                </div>
            @endforeach
        @else
            <div class="p-6">No content yet, please visit after some days.</div>
        @endif
    </div>
</x-guest-layout>

