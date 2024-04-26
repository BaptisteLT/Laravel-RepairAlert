<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your App Name</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @yield('stylesheets')


    
    <link rel="stylesheet" href="/css/base/navbar.css">
    <link rel="stylesheet" href="/css/base/footer.css">
    <link rel="stylesheet" href="/css/base/base.css">
</head>
    

<body>

    <!-- Header -->
    <header>
        <nav>
            <!-- Your navigation links here -->
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <!-- Your footer content here -->
        <p>&copy; {{ date('Y') }} Your App Name. All rights reserved.</p>
    </footer>

    @yield('scripts')
</body>
</html>
