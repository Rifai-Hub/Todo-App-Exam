<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">Todo App <span>Rifai Gusnian</span></a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
<footer class="footer">
    <div class="container text-center">
        <h2 class="mb-0">© 2024 Rifai Gusnian. All rights reserved.</h2>
    </div>
</footer>

</body>
</html>
