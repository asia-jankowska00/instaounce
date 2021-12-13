@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center">

  <div class="p-6">
    <h1 class="text-2xl text-center font-medium mb-1">{{ $user->username }}</h1>
    <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
      and received {{
      $user->receivedLikes->count() }} likes
    </p>
  </div>

  @if ($posts->count())
  @foreach ($posts as $post)
  <x-post :post="$post" />
  @endforeach

  {{ $posts->links() }}
  @else
  <p>{{ $user->username }} does not have any posts</p>
  @endif

</div>

@endsection