<x-guest-layout>
    <x-slot name="header">
        {{ __('Simple Post') }}
        <div style="font-size: 16px;">
            Read, create, edit, and delete posts simply!
        </div>
    </x-slot>



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/admin') }}" class="font-bold text-gray-900 hover:text-gray-600 dark:text-black-400 dark:hover:text-gray "> Admin </a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:text-gray-600 dark:text-black-400 dark:hover:text-gray ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-900 hover:text-gray-600 dark:text-black-400 dark:hover:text-gray ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        @if($posts)
            @foreach ($posts as $post)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <img src="/images/post.jpg" alt="Article Image" class="mb-4 rounded-lg">
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

