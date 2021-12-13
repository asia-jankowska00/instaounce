@extends('layouts.app')

@section('content')
<div class="mb-4 flex flex-col items-center justify-center">
  <x-post :post="$post" />

  <div
    class="p-5 w-1/2 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
    @auth
    <form action="{{ route('posts.comments', $post) }}" method="post" class="mb-4">
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
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comment</button>
      </div>
    </form>
    @endauth

    <h2 class="font-bold text-xl mb-4">Comments</h2>

    @if ($post->comments->count())
    @foreach ($post->comments->sortByDesc('created_at') as $comment)
    <x-comment :comment="$comment" />
    @endforeach

    @else

    <p>There are no comments.</p>
    @endif
  </div>

</div>
@endsection