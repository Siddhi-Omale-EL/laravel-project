<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myDesk</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        display: flex; /* Add this line to make the container a flex container */
        justify-content: space-between; /* Align items horizontally with space between them */
        align-items: center; /* Align items vertically at the center */
    }

    header {
        /* background-color: #333; */
        background-color: #fff;
        color: #333;
        padding: 1em 0;
    }

    .logo img {
        margin: 0;
        font-size: 1.5em;
        width: 125px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        text-align: right;
    }

    nav ul li {
        display: inline;
        margin-left: 15px;
    }

    nav a {
        text-decoration: none;
        color: #333;
    }

    .hero {
        background-color: #f8f8f8;
        padding: 80px 0;
        text-align: center;
    }

    .hero h2 {
        color: #333;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .features {
        background-color: #fff;
        padding: 60px 0;
    }

    .feature {
        text-align: center;
    }

    .feature img {
        max-width: 100px;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1em 0;
    }

</style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                {{-- <h1>MyDesk</h1> --}}
                <img src="{{asset('front/Screenshot_3.png')}}" alt="image" />
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="{{route('signin')}}">Register</a></li>
                    <li><a href="{{route('signup')}}">Login</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <!-- Rest of your content remains the same -->

</body>
</html>

    <section class="hero">
            <h2>Welcome to myDesk!</h2>
            <img src="{{asset('front/Screenshot_2.png')}}"/>
            <p>This is a beautifully designed website created with HTML and CSS.</p>
            <a href="#" class="btn">Learn More</a>

    </section>

    <section class="features">
        <div class="container">
            <h2>Key Features</h2>
            <div class="feature">
                <img src="icon1.png" alt="Feature 1">
                <h3>Feature 1</h3>
                <p>Description of Feature 1.</p>
            </div>
            <div class="feature">
                <img src="icon2.png" alt="Feature 2">
                <h3>Feature 2</h3>
                <p>Description of Feature 2.</p>
            </div>
            <!-- Add more features as needed -->
        </div>
    </section>

    <footer>
            <p>&copy; 2024 myDesk. All rights reserved.</p>
    </footer>
</body>
</html>
