@props(['post' => $post])

<div
    class="mb-4 w-1/2 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
    @if($post->image_path)
    <a href="{{ route('posts.show', $post)}}">
        <img class="rounded-t-lg" src="{{ asset('images/' . $post->image_path)}}" />
    </a>
    @endif

    <div class="p-5">
        <a href="{{ route('users.posts', $post->user)}}" class="font-bold">{{ $post->user->username }}</a> <span
            class="text-gray-600 text-sm">{{
            $post->created_at->diffForHumans() }}</span>

        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{ $post->body }}</p>

        @unless(Route::is('posts.show') )
        <a href="{{ route('posts.show', $post)}}"
            class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            View post
            <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
        @endunless

        @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
        @endcan

        <div class="flex items-center">
            @auth
            @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
            @else
            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
            @endif
            @endauth

            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
        </div>
    </div>
</div>