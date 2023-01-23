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
                    <ul>
                        <li class="bg-gray-200 rounded-lg p-5 mt-4">
                            <div class="w-full flex justify-between mb-3">
                                <h1 class="font-bold text-2xl flex items-center gap-4">Created by {{ $users->find($post->user_id)->name }}</h1>
                                <h1 class="font-bold text-2xl">Created at {{ $post->created_at->format('j M Y, g:i a') }}</h1>
                            </div>
                            <h1 class="text-lg font-bold mt-2">Title: </h1>
                            <p>{{ $post->title }}</p>
                            <h1 class="text-lg font-bold mt-2">Summary: </h1>
                            <p>{{ $post->summary }}</p>
                            <h1 class="text-lg font-bold mt-2">Content: </h1>
                            <p class="break-words">{{ $post->content }}</p>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex flex-col gap-4">
                                <label for="content" class="text-2xl font-bold">Add Comment</label>
                                <textarea name="content" id="content" cols="30" rows="5" class="border-2 border-gray-300 rounded-lg p-2" placeholder="Content"></textarea>
                                <button type="submit" class="bg-blue-500 text-white rounded-lg p-2">Add Comment</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-2xl font-bold">Comments</h1>
                        <div class="mt-4">
                            @foreach ($comments as $comment)
                                <div class="bg-gray-200 rounded-lg p-5 mt-4">
                                    <div class="w-full flex justify-between mb-3">
                                        <h1 class="font-bold text-2xl flex items-center gap-4">Comment from {{ $users->find($comment->user_id)->name }}</h1>
                                        <h1 class="font-bold text-2xl">Created at {{ $comment->created_at->format('j M Y, g:i a') }}</h1>
                                    </div>
                                    <p class="break-words">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
