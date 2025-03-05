<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #2a2a72, #009ffd);
            color: white;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffdb58;
        }

        .search {
            display: flex;
            align-items: center;
        }

        .search input {
            padding: 8px;
            border: none;
            border-radius: 4px;
        }

        .search button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        .feature iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
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

        .new-releases {
            text-align: left;
            padding: 50px 20px;
        }

        .new-releases h2 {
            display: inline-block;
            margin-right: 20px;
        }

        .new-releases a {
            color: #007bff;
            text-decoration: none;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            margin: 20px 0;
        }

        .carousel-item {
            flex: 0 0 auto;
            width: 200px;
            margin-right: 10px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .carousel-nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .carousel-nav button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 24px;
            margin: 0 10px;
            cursor: pointer;
        }

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #2a2a72, #009ffd);
            color: white;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffdb58;
        }

        .search {
            display: flex;
            align-items: center;
        }

        .search input {
            padding: 8px;
            border: none;
            border-radius: 4px;
        }

        .search button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        .feature iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
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

        .new-releases {
            text-align: left;
            padding: 50px 20px;
        }

        .new-releases h2 {
            display: inline-block;
            margin-right: 20px;
        }

        .new-releases a {
            color: #007bff;
            text-decoration: none;
        }

        .carousel {
            display: flex;
            overflow-x: auto;
            margin: 20px 0;
        }

        .carousel-item {
            flex: 0 0 auto;
            width: 200px;
            margin-right: 10px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .carousel-nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .carousel-nav button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 24px;
            margin: 0 10px;
            cursor: pointer;
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

        /* Best Games Section */
        .best-games {
            padding: 50px 20px;
            background: #f0f0f0;
            color: #000;
        }

        .best-games-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .best-games-platforms {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .best-games-platforms button {
            padding: 8px 15px;
            border: 1px solid #007bff;
            border-radius: 5px;
            background: transparent;
            color: #007bff;
            cursor: pointer;
        }

        .best-games {
            padding: 50px 20px;
            background: #f0f0f0;
            color: #000;
        }

        .best-games-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .best-games-platforms {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .best-games-platforms button {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background-color: white;
            cursor: pointer;
        }

        .best-games-platforms button.active {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .best-games-list {
            display: flex;
            overflow-x: auto;
            gap: 20px;
        }

        .best-games-item {
            flex: 0 0 auto;
            width: 200px;
            text-align: center;
        }

        .best-games-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .best-games-item .score {
            background-color: #00c853;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            margin-bottom: 5px;
            display: inline-block;
        }

        .best-games-item .acclaim {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .best-games-item .platform-icon {
            border: 1px solid #ddd;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 12px;
            display: inline-block;
        }

        .best-games-item .progress-bar {
            height: 5px;
            background-color: #00c853;
            border-radius: 3px;
            margin-top: 10px;
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
        <div class="logo">GameVerse</div>
        <nav>
            <a href="#home">Home</a>
            <a href="/games">Games</a>
            <a href="/iklans">iklan</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </nav>
        <div class="search">
            <input type="text" placeholder="Search">
            <button>Search</button>
        </div>
    </header>

    <div class="container">
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
                <iframe src="https://www.youtube.com/embed/1RC1yxqTTd8" allowfullscreen></iframe>
                <h3>Immersive Reviews</h3>
                <p>Read detailed and engaging reviews from real players.</p>
            </div>
            <div class="feature">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_2" allowfullscreen></iframe>
                <h3>Stunning Visuals</h3>
                <p>Get a glimpse of game worlds through screenshots and videos.</p>
            </div>
            <div class="feature">
                <iframe src="https://www.youtube.com/embed/VIDEO_ID_3" allowfullscreen></iframe>
                <h3>Community Favorites</h3>
                <p>See which games are trending and loved by the community.</p>
            </div>
        </section>

        <!-- new release -->
        <section class="new-releases">
            <h2>New Releases</h2>
            <a href="#">SEE ALL</a>
            <div class="carousel">
                <div class="carousel-item">
                    <img src="game1.jpg" alt="Game 1">
                </div>
                <div class="carousel-item">
                    <img src="game2.jpg" alt="Game 2">
                </div>
                <div class="carousel-item">
                    <img src="game3.jpg" alt="Game 3">
                </div>
                <div class="carousel-item">
                    <img src="game4.jpg" alt="Game 4">
                </div>
                <div class="carousel-item">
                    <img src="game5.jpg" alt="Game 5">
                </div>
                <div class="carousel-item">
                    <img src="game6.jpg" alt="Game 6">
                </div>
                <div class="carousel-item">
                    <img src="game7.jpg" alt="Game 7">
                </div>
            </div>
            <div class="carousel-nav">
                <button class="prev">&larr;</button>
                <button class="next">&rarr;</button>
            </div>
        </section>
    </div>

    <section class="best-games">
        <div class="best-games-header">
            <h2>Best Games on</h2>
            <a href="#">BROWSE ALL GAMES</a>
        </div>
        <div class="best-games-platforms">
            <button class="active">PS5</button>
            <button>PC</button>
            <button>Nintendo Switch</button>
            <button>PS4</button>
            <button>Xbox One</button>
            <button>Xbox Series X</button>
        </div>
        <div class="best-games-list">
            <div class="best-games-item">
                <img src="elden_ring.jpg" alt="Elden Ring">
                <h3>1. Elden Ring</h3>
                <div class="score">96</div>
                <div class="acclaim">Universal Acclaim</div>
                <div class="platform-icon">PS5</div>
                <div class="progress-bar"></div>
            </div>
            <div class="best-games-item">
                <img src="baldurs_gate.jpg" alt="Baldur's Gate 3">
                <h3>2. Baldur's Gate 3</h3>
                <div class="score">96</div>
                <div class="acclaim">Universal Acclaim</div>
                <div class="platform-icon">PS5</div>
                <div class="progress-bar"></div>
            </div>
            <div class="best-games-item">
                <img src="elden_ring_dlc.jpg" alt="Elden Ring: Shadow of the Erdtree">
                <h3>3. Elden Ring: Shadow of the... Erdtree</h3>
                <div class="score">94</div>
                <div class="acclaim">Universal Acclaim</div>
                <div class="platform-icon">PS5</div>
                <div class="progress-bar"></div>
            </div>
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
        <p>&copy; 2025 GameVerse. All rights reserved.</p>
    </footer>
</body>
</html>