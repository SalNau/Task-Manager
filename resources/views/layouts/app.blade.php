<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Add your CSS and JavaScript links here -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Updated path to your custom CSS file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<body>
    <header>
        <!-- Add your header content here -->        
    </header>
    <nav>
        <!-- Add your navigation menu here -->
    </nav>
    <main>
        @yield('content') <!-- This is where the content of child views will be inserted -->
    </main>
    <footer>
        <!-- Add your footer content here -->
    </footer>
</body>
</html>









