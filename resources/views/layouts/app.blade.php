<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router@3.0.0/dist/vue-router.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        tailwind.config = {

          theme: {
            screens: {
              sm: "480px",
              md: "768px",
              lg: "976px",
              xl: "1440px",
            },
            extend: {
              colors: {
                clifford: "#da373d",
                brightred: "hsl(12, 88%, 59%)",
                brightredLight: "hsl(12, 88%, 69%)",
                brightredSupLight: "hsl(12, 88%, 95%)",
                darkBlue: "hsl(228, 39%, 23%)",
                darkGrayishBlue: "hsl(223, 12%, 61%)",
                veryDarkBlue: "hsl(223, 12%, 13%)",
                veryPaleRed: "hsl(13, 100%, 96%)",
                veryLightGray: "hsl(0, 0%, 98%)",
              },
            },
          },
        };
      </script>
    <title>LaraPost</title>


</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex justify-between">
            <li>
              <a href="/" class="p-3">Home</a>

            </li>
            <li>
              <a href="/dashboard" class="p-3">Dashboard</a>

            </li>
            <li>
              <a href="/posts" class="p-3">Post</a>

            </li>
        </ul>
        <ul class="flex justify-between">
            @auth
            <li>
                <a href="" class="p-3">{{ auth()->user()->name }}</a>

              </li>
              <li>
                <form action="/logout" method="POST" class="inline p-3">
                    @csrf
                    <button type="submit">Logout</button>
                </form>

              </li>
            @endauth

            @guest
            <li>
                <a href="/login" class="p-3">Login</a>

              </li>
              <li>
                <a href="/register" class="p-3">Register</a>

              </li>
              @endguest



        </ul>
    </nav>
@yield('content')
</body>
</html>
