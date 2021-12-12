@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user)}}" class="font-bold">{{ $post->user->username }}</a> <span
        class="text-gray-600 text-sm">{{
        $post->created_at->diffForHumans() }}</span>

    @if($post->image_path)
    <div class="w-1/3">
        <img src="{{ asset('images/' . $post->image_path)}}" />
    </div>
    @endif

    <p class="mb-2">{{ $post->body }}</p>


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


    @auth
    <form action="{{ route('posts.comments', $post) }}" method="post" class="mb-4 w-1/3">
        @csrf
        <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                placeholder="Write a comment..."></textarea>

            @error('body')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Comment</button>
        </div>
    </form>
    @endauth

    <h2 class="font-bold text-xl">Comments</h2>

    @if ($post->comments->count())
    @foreach ($post->comments as $comment)
    <x-comment :comment="$comment" />
    @endforeach

    @else

    <p>There are no comments.</p>
    @endif

</div>