<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                        Create Post
                    </a>
                    <ul>
                        @foreach ($posts as $post)
                            @if ($post->access == 'public' || $post->user_id == Auth::user()->id)
                                <li class="bg-gray-200 rounded-lg p-5 mt-4">
                                    <div class="w-full flex justify-between mb-3">
                                        <h1 class="font-bold text-2xl flex items-center gap-4">{{__('Created by')}}
                                            {{ $users->find($post->user_id)->name }}
                                            @can ('update-post', $post, Auth::user())
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold rounded text-base py-1 px-3">
                                                    Edit Post
                                                </a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold rounded text-base py-1 px-3">
                                                        {{__('Delete Post')}}
                                                    </button>
                                                </form>
                                            @endcan
                                            @if ($post->commentable)
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded text-base py-1 px-3">
                                                    View Comments
                                                </a>
                                            @endif

                                        </h1>
                                        <h1 class="font-bold text-2xl">{{__('Created at')}}
                                            {{ $post->created_at->format('j M Y, g:i a') }}</h1>
                                    </div>
                                    <h1 class="text-lg font-bold mt-2">{{__('Title')}}: </h1>
                                    <p>{{ $post->title }}</p>
                                    <h1 class="text-lg font-bold mt-2">{{__('Summary')}}: </h1>
                                    <p>{{ $post->summary }}</p>
                                    <h1 class="text-lg font-bold mt-2">{{__('Content')}}: </h1>
                                    <p class="break-words">{{ $post->content }}</p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
