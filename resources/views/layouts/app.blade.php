<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
  <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js" defer></script>
  <title>Intaounce</title>
</head>

<body class="bg-gray-200">
  <nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
      <li>
        <a href="/" class="p-3">Home</a>
      </li>
      <li>
        <a href="{{ route('posts')}}" class="p-3">Posts</a>
      </li>
      <li>
        <a href="{{ route('posts.new')}}" class="p-3">Create new post</a>
      </li>
    </ul>

    <ul class="flex items-center">
      @auth
      <li>
        <a href="{{ route('users.posts', auth()->user())}}" class="p-3">{{auth()->user()->username}}</a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="p-3">Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li>
        <a href="{{ route('login')}}" class="p-3">Login</a>
      </li>
      <li>
        <a href="{{ route('register')}}" class="p-3">Register</a>
      </li>
      @endguest
    </ul>
  </nav>
  @yield('content')
</body>

</html>