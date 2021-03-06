@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-6/12 bg-white p-6 rounded-lg">
    <form action="{{ route('register')}}" method="post">
      @csrf
      <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="">

        @error('name')
        <p class="text-red-500 mt-2 text-sm"> {{$message}}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username')}}">

        @error('username')
        <p class="text-red-500 mt-2 text-sm"> {{$message}}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
        
        @error('email')
        <p class="text-red-500 mt-2 text-sm"> {{$message}}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="{{ old('password')}}">
        
        @error('password')
        <p class="text-red-500 mt-2 text-sm"> {{$message}}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password_confirmation" class="sr-only">Password confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
        
        @error('password')
        <p class="text-red-500 mt-2 text-sm"> {{$message}}</p>
        @enderror
      </div>

      <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
      </div>
    </form>
  </div>

</div>
@endsection
