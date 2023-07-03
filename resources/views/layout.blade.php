<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#f5deb3",
                        },
                    },
                },
            };
        </script>
        <title>GigHub | Find All Short & Long Term Gigs Here! </title>
    </head>
    <body class="mb-40">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="logo" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-md text-gray-400">
                <li class="border-2 border-gray-400 px-2 py-1 rounded-2xl hover:border-laravel hover:bg-black  ">
                    <a href="register.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li class="border-2 border-gray-400 px-2 py-1 rounded-2xl hover:border-laravel hover:bg-black  ">
                    <a href="login.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-gray-500 h-20 mt-12 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; GigHub 2023, All Rights reserved</p>
            <a href="/listings/create" class="absolute rounded-lg border-2 border-white  top-1/3 right-10 bg-black text-white hover:bg-white hover:text-black hover:border-black py-2 px-5">Post Job</a>
        </footer>
        <x-flash-message/>
    </body>
</html>
