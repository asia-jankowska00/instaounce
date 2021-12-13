@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">
    @auth
    <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data" class="mb-4">
      @csrf
      <div class="mb-4">
        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
          placeholder="Post something!"></textarea>

        @error('body')
        <div class="text-red-500 mt-2 text-sm">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-4">
        <input type="file" name="image" class="form-control">

        @error('image')
        <div class="text-red-500 mt-2 text-sm">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div>
        <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create post</button>
      </div>
    </form>
    @endauth
  </div>
</div>
@endsection