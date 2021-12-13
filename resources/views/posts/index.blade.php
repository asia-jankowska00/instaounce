@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center">
  @if ($posts->count())
  @foreach ($posts as $post)
  <x-post :post="$post" />
  @endforeach

  {{ $posts->links() }}
  @else
  <p>There are no posts</p>
  @endif
</div>
@endsection