<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight font-light">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="p-6 text-gray-900">
                    @csrf
                    @method('patch')
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 mt-2 text-sm">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $post->title }}">
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="sr-only">Summary</label>
                        <input type="text" name="summary" id="summary" placeholder="Summary" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $post->summary }}">
                        @error('summary')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="content" class="sr-only">Content</label>
                        <textarea name="content" id="content" cols="30" rows="4" placeholder="Content" class="bg-gray-100 border-2 w-full p-4 rounded-lg">{{ $post->content }}</textarea>
                        @error('content')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="expirable" class="">Expirable</label>
                        <input type="checkbox" name="expirable" id="expirable" class="bg-gray-100 border-2 rounded" value=1 @if($post->expirable) checked="checked" @endif>
                        <label for="commentable" class="ml-2">Commentable</label>
                        <input type="checkbox" name="commentable" id="commentable" class="bg-gray-100 border-2 rounded" value=1 @if($post->commentable) checked="checked" @endif>
                        @error('caducable')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <select name="access" id="access" class="bg-gray-100 border-2 w-full p-4 rounded">
                            <option value="public">Public</option>
                            <option value="private" @if($post->access == 'private') selected="selected" @endif>Private</option>
                        </select>
                        @error('access')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>