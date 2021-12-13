@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-1/2 bg-white shadow-md rounded-lg border text-center p-4 sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h3 class="text-gray-900 text-3xl font-bold mb-2 dark:text-white">Welcome to instaounce</h3>
    <p class="text-base sm:text-lg text-gray-500 mb-5 dark:text-gray-400">Create and browse posts, upload images, like
      and comment on what others have created.</p>
    <div class="sm:flex items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
      <a href="{{ route('register')}}">
        <button type="button"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
      </a>
      <a href="{{ route('posts')}}">
        <button type="button"
          class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Browse
          posts</button>
      </a>
    </div>
  </div>
</div>
@endsection