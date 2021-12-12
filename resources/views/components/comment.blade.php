@props(['comment' => $comment])

<div class="mb-4 ml-4 pl-4 border-l-2">
    <a href="{{ route('users.posts', $comment->user)}}" class="font-bold">{{ $comment->user->username }}</a> <span
        class="text-gray-600 text-sm">{{
        $comment->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $comment->body }}</p>


    @can('delete', $comment)
    <form action="{{ route('posts.comments.destroy', $comment) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
    @endcan

    <div class="flex items-center">
        @auth
        @if (!$comment->likedBy(auth()->user()))
        <form action="{{ route('posts.comments.likes',  [$comment->post, $comment])}}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('posts.comments.likes', [$comment->post, $comment]) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif
        @endauth

        <span>{{ $comment->likes->count() }} {{ Str::plural('like', $comment->likes->count()) }}</span>
    </div>

</div>