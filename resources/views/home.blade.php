<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Game Review Website</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #2a2a72, #009ffd);
            color: #fff;
            overflow-x: hidden;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        header nav {
            display: flex;
            gap: 20px;
            justify-content: center; /* Menambahkan ini agar tombol terpusat */
        }

        header nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffdb58;
        }

        .company-profile {
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            margin-top: 80px;
            text-align: center;
            border-bottom: 2px solid #ffdb58;
        }

        .company-profile h2 {
            margin: 0;
            font-size: 2em;
        }

        .company-profile p {
            font-size: 1.2em;
            margin: 10px 0 0;
        }

        .hero {
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        .hero h1 {
            font-size: 4em;
            margin: 0;
        }

        .hero p {
            font-size: 1.5em;
            margin: 20px 0;
        }

        .hero .cta {
            display: inline-block;
            padding: 10px 20px;
            background: #ffdb58;
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: transform 0.3s;
        }

        .hero .cta:hover {
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .features {
            padding: 50px 20px;
            background: #fff;
            color: #000;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            animation: slideUp 2s ease-in-out;
        }

        .feature {
            text-align: center;
            padding: 20px;
            background: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .feature img {
            width: 100px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .feature:hover img {
            transform: rotate(360deg);
        }

        .feature h3 {
            margin: 10px 0;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .latest-articles {
            background: #000;
            color: #fff;
            padding: 30px 20px;
            text-align: center;
        }

        .latest-articles h3 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .article {
            margin: 10px 0;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #000;
            color: #fff;
            position: relative;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">GameHub</div>
        <nav>
            <a href="#home">Home</a>
            <a href="/posts">News</a>
            <a href="/products">Products</a>
            <a href="/games">Games</a>
            <a href="/reviews">Review</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
            <a href="/logout" style="display: none;">Logout</a>
        </nav>
    </header>

    <div class="company-profile">
        <h2>Welcome to GameHub</h2>
        <p>Your go-to platform for the latest and greatest in gaming.</p>
    </div>

    <section class="hero" id="home">
        <h1>Discover Your Next Adventure</h1>
        <p>Explore reviews, ratings, and sneak peeks of the best games out there.</p>
        <a href="#features" class="cta">Get Started</a>
    </section>

    <section class="features" id="features">
        <div class="feature">
            <img src="https://via.placeholder.com/100" alt="Feature 1">
            <h3>Immersive Reviews</h3>
            <p>Read detailed and engaging reviews from real players.</p>
        </div>
        <div class="feature">
            <img src="https://via.placeholder.com/100" alt="Feature 2">
            <h3>Stunning Visuals</h3>
            <p>Get a glimpse of game worlds through screenshots and videos.</p>
        </div>
        <div class="feature">
            <img src="https://via.placeholder.com/100" alt="Feature 3">
            <h3>Community Favorites</h3>
            <p>See which games are trending and loved by the community.</p>
        </div>
    </section>

    <section class="latest-articles">
        <h3>Latest Articles</h3>
        <div class="article">Article 1: Exciting Game Announcements</div>
        <div class="article">Article 2: Tips for Beginners</div>
        <div class="article">Article 3: Upcoming Releases</div>
        <div class="article">Article 4: Game Mechanics Explained</div>
        <div class="article">Article 5: Hidden Gems of 2025</div>
    </section>

    <footer>
        <p>&copy; 2025 YPcrystal210. All rights reserved.</p>
    </footer>
</body>
</html>
