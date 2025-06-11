<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse - Ultimate Gaming Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
            --light-alpha: rgba(245, 243, 255, 0.75); /* Added for consistency */
            --dark-alpha: rgba(10, 4, 28, 0.85); /* Added for consistency */
            --secondary-alpha: rgba(255, 0, 229, 0.2); /* Added for consistency */
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Oxanium', sans-serif;
            /* Changed body background to match user layout gradient */
            background-color: var(--dark);
            background-image: radial-gradient(circle at 50% 50%, rgba(112, 0, 255, 0.15), var(--dark) 40%);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1rem 5%;
            /* Changed header background to match user layout */
            background: var(--dark-alpha);
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
        }

        .logo {
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .nav-links { /* Container untuk link navigasi */
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--light-alpha); /* Adjusted to light-alpha for consistency */
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 70%;
        }
        
        .nav-links a:hover {
            color: var(--accent); /* Consistent hover color */
        }

        .search-container {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 0.9rem 2rem 0.9rem 1.5rem;
            border: 2px solid rgba(255,255,255,0.15);
            border-radius: 30px;
            background: rgba(255,255,255,0.08);
            color: var(--light);
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(112,0,255,0.3);
        }

        .search-button {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--gradient);
            border: none;
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .search-button:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 0 20px rgba(112,0,255,0.4);
        }
        
        .search-button i {
            font-size: 0.9rem;
        }


        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 150px 5% 5%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150vw;
            height: 150vh;
            /* Changed radial gradient to match user layout */
            background: radial-gradient(circle at 50% 50%, rgba(112,0,255,0.15) 0%, var(--dark) 70%);
            z-index: 0;
            animation: pulse 6s infinite;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
            text-shadow: 0 0 30px rgba(112,0,255,0.3);
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            font-family: 'Roboto', sans-serif;
        }

        .cta-container {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
        }

        .cta {
            padding: 1.2rem 3rem;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .cta-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 8px 30px rgba(112,0,255,0.3);
        }

        .cta-secondary {
            border: 2px solid var(--primary);
            color: var(--primary);
            /* Changed background to rgba(112,0,255,0.1) for consistency */
            background: rgba(112,0,255,0.1);
        }

        .cta:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(112,0,255,0.5);
        }
        
        /* General Section Styling */
        .section-padding {
            padding: 6rem 5%;
        }

        .section-title {
            font-size: 3rem;
            margin-bottom: 3rem;
            text-align: center;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* --- STYLING FOR NEW SECTIONS --- */

        /* Features Section */
        .features-grid { /* Changed to features-grid for better semantic naming and flexibility */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .feature {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            transition: all 0.3s ease;
        }
        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(112,0,255,0.2);
        }

        .feature iframe {
            width: 100%;
            height: 200px;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border: none;
        }

        .feature h3 {
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .feature p {
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            color: rgba(255,255,255,0.8);
        }

        /* New Releases Section */
        .new-releases-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }
        .new-releases-header h2 {
            font-size: 2.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0;
        }
        .new-releases-header a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 1px solid var(--accent);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .new-releases-header a:hover {
            background-color: var(--accent);
            color: var(--dark);
        }

        .carousel {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: calc((100% / 4) - 1.875rem);
            gap: 2.5rem;
            overflow-x: auto;
            padding-bottom: 1.5rem;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .carousel::-webkit-scrollbar {
            display: none;
        }

        .carousel-item {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .carousel-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(112,0,255,0.15);
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            aspect-ratio: 3/4;
            object-fit: cover;
            display: block;
        }
        .carousel-nav {
            text-align: center;
            margin-top: 2rem;
        }
        .carousel-nav button {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 20px;
            font-size: 1.2rem;
            margin: 0 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .carousel-nav button:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(112,0,255,0.3);
        }


        /* Best Games Section */
        .best-games-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }
        .best-games-header h2 {
            font-size: 2.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0;
        }
        .best-games-header a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 1px solid var(--accent);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .best-games-header a:hover {
            background-color: var(--accent);
            color: var(--dark);
        }

        .best-games-platforms {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
            justify-content: center;
        }
        .best-games-platforms button {
            background: rgba(255,255,255,0.1);
            color: var(--light);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 0.8rem 1.8rem;
            border-radius: 25px;
            font-family: 'Oxanium', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .best-games-platforms button:hover {
            background: rgba(255,255,255,0.2);
            border-color: var(--primary);
        }
        .best-games-platforms button.active {
            background: var(--gradient);
            color: white;
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(112,0,255,0.2);
        }

        .best-games-list {
            display: grid;
            gap: 1.5rem;
        }
        .best-games-item {
            display: grid;
            grid-template-columns: 80px 1fr auto;
            grid-template-areas: 
                "image title score"
                "image acclaim platform"
                "image progress progress";
            gap: 0.5rem 1.5rem;
            align-items: center;
            background: rgba(255,255,255,0.05);
            padding: 1rem;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .best-games-item:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 25px rgba(112,0,255,0.15);
        }

        .best-games-item img {
            grid-area: image;
            width: 80px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .best-games-item h3 {
            grid-area: title;
            font-size: 1.2rem;
            margin: 0;
            color: var(--light);
            line-height: 1.3;
        }
        .best-games-item .score {
            grid-area: score;
            background: var(--accent);
            color: var(--dark);
            font-weight: 700;
            font-size: 1.5rem;
            padding: 0.5rem 0.8rem;
            border-radius: 8px;
            text-align: center;
            justify-self: end;
        }
        .best-games-item .acclaim {
            grid-area: acclaim;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
            font-family: 'Roboto', sans-serif;
        }
        .best-games-item .platform-icon {
            grid-area: platform;
            font-size: 0.8rem;
            background-color: rgba(255,255,255,0.2);
            color: var(--light);
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
            text-transform: uppercase;
            justify-self: start;
        }
        .best-games-item .progress-bar {
            grid-area: progress;
            height: 8px;
            background: var(--gradient);
            border-radius: 4px;
            margin-top: 0.5rem;
            width: 100%;
        }

        /* Featured Games Section */
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .game-card {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(112,0,255,0.2);
        }

        .game-thumbnail {
            position: relative;
            padding-bottom: 60%;
            overflow: hidden;
        }

        .game-thumbnail img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .game-card:hover .game-thumbnail img {
            transform: scale(1.05);
        }

        .game-info {
            padding: 1.5rem;
        }

        .game-title {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--light);
        }

        .game-genre {
            color: var(--accent);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-family: 'Roboto', sans-serif;
        }

        .game-platforms {
            display: flex;
            gap: 0.8rem;
            color: rgba(255,255,255,0.7);
            font-size: 1.2rem;
        }

        /* Video Features Section */
        .video-features {
            background: rgba(0,0,0,0.2);
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .video-card {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(112,0,255,0.2);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-info {
            padding: 1.5rem;
        }

        .video-info h3 {
            margin-bottom: 0.5rem;
            color: var(--accent);
            font-size: 1.3rem;
        }
        .video-info p {
            font-family: 'Roboto', sans-serif;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.8);
        }


        /* Streamers Section */
        .streamers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .streamer-card {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .streamer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(112,0,255,0.2);
        }

        .streamer-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            border: 3px solid var(--primary);
            object-fit: cover;
        }
        .streamer-card h3 {
            font-size: 1.4rem;
            color: var(--accent);
            margin-bottom: 0.5rem;
        }
        .streamer-card p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
            font-family: 'Roboto', sans-serif;
        }


        /* Footer */
        footer {
            background: var(--dark);
            padding: 5rem 5% 3rem;
            margin-top: 6rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h4 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            color: var(--accent);
            font-weight: 700;
        }

        .footer-section p {
            font-family: 'Roboto', sans-serif;
            color: rgba(255,255,255,0.7);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 1rem;
            transition: color 0.3s ease, padding-left 0.3s ease;
            font-family: 'Roboto', sans-serif;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 1.2rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-4px) scale(1.1);
            color: white;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-family: 'Roboto', sans-serif;
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
        }


        /* Animations */
        @keyframes pulse {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            50% { transform: translate(-50%, -50%) scale(1.05); opacity: 0.7; }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 4rem;
            }
            .search-container {
                width: 280px;
            }
            .carousel {
                grid-auto-columns: calc((100% / 3) - 1.7rem); 
            }
        }

        @media (max-width: 992px) {
            header {
                padding: 1rem 3%;
            }
            .nav-links {
                display: none;
            }
            .search-container {
                display: none; 
            }

            .hero {
                padding: 120px 5% 5%;
                text-align: center;
            }
            .hero-content {
                margin: 0 auto;
            }
            .hero h1 {
                font-size: 3.2rem;
            }
            .hero p {
                font-size: 1.3rem;
                max-width: 100%;
            }
            .cta-container {
                justify-content: center;
            }
            .section-title {
                font-size: 2.5rem;
            }
            .new-releases-header, .best-games-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            .carousel {
                grid-auto-columns: calc((100% / 2) - 1.25rem); 
            }
            .best-games-item {
                grid-template-columns: 60px 1fr auto;
                grid-template-areas: 
                    "image title title"
                    "image score platform"
                    "progress progress progress";
                gap: 0.5rem 1rem;
            }
            .best-games-item img {
                width: 60px;
                height: 80px;
            }
            .best-games-item h3 {
                font-size: 1.1rem;
            }
            .best-games-item .score {
                font-size: 1.2rem;
                padding: 0.4rem 0.6rem;
            }
        }

        @media (max-width: 768px) {
            .logo {
                font-size: 1.8rem;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero p {
                font-size: 1.1rem;
            }
            .cta-container {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }
            .cta {
                width: 90%;
                max-width: 300px;
                justify-content: center;
                padding: 1rem 2rem;
            }
            .feature {
                padding: 1.5rem;
            }
            .feature h3 {
                font-size: 1.5rem;
            }
            .carousel {
                grid-auto-columns: 80%; 
            }
            .best-games-platforms button {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .social-links {
                justify-content: center;
            }
        }
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .section-title {
                font-size: 2rem;
            }
            .new-releases-header h2, .best-games-header h2 {
                font-size: 1.8rem;
            }
            .carousel { 
                grid-auto-columns: 90%; 
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">GAMEVERSE</div>
        <nav class="nav-links">
            <a href="#home">Home</a>
            <a href="/games">Games</a>
            <a href="/iklans">Iklan</a>
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a href="{{ route('user.dashboard') }}">User Dashboard</a>
                @endif
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endauth
        </nav>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search games, reviews...">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Next-Level Gaming Experience</h1>
                <p>Discover the ultimate gaming universe with curated content, live streams, and community-powered reviews.</p>
                <div class="cta-container">
                    <a href="#games" class="cta cta-primary">
                        <i class="fas fa-gamepad"></i>
                        Explore Games
                    </a>
                    <a href="#streams" class="cta cta-secondary">
                        <i class="fas fa-video"></i>
                        Watch Streams
                    </a>
                </div>
            </div>
        </section>

        <section class="features section-padding" id="features">
            <h2 class="section-title">Why GameVerse?</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2.5rem auto; font-size: 1.1rem; font-family: 'Roboto', sans-serif; line-height: 1.7; opacity: 0.9;">
                At GameVerse, we understand your passion for the gaming world. More than just a platform, we are your fellow travelers in exploring the limitless gaming universe. We believe every game has a unique story, and you deserve the best way to discover, experience, and share them. This is why GameVerse exists for you:
            </p>
            
            <div class="features-grid">
                <div class="feature">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                        title="YouTube video player" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    <h3>Immersive Reviews</h3>
                    <p>Read detailed and engaging reviews from real players.</p>
                </div>
                 <div class="feature">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/xvFZjo5PgG0" 
                        title="YouTube video player" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    <h3>Live Streams & Tournaments</h3>
                    <p>Watch your favorite streamers and join exciting tournaments.</p>
                </div>
                 <div class="feature">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/L_A70c79J7k" 
                        title="YouTube video player" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    <h3>Community & Support</h3>
                    <p>Connect with other gamers and get support from our dedicated team.</p>
                </div>
            </div>
        </section>
        
        <section class="new-releases section-padding" id="new-releases">
            <div class="new-releases-header">
                <h2>New Releases</h2>
                <a href="#">SEE ALL</a>
            </div>
            <div class="carousel">
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,fantasy,1" alt="Game 1">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,scifi,2" alt="Game 2">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,adventure,3" alt="Game 3">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,action,4" alt="Game 4">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,rpg,5" alt="Game 5">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,strategy,6" alt="Game 6">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,shooter,7" alt="Game 7">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,horror,8" alt="Game 8">
                </div>
            </div>
             <div class="carousel-nav">
                <button onclick="scrollCarousel(-1)">&#8249;</button>
                <button onclick="scrollCarousel(1)">&#8250;</button>
            </div>
        </section>

        <section class="best-games section-padding" id="best-games">
            <div class="best-games-header">
                <h2>Top Rated Games</h2>
                <a href="#">VIEW ALL</a>
            </div>
            <div class="best-games-platforms">
                <button class="active">All Platforms</button>
                <button>PC</button>
                <button>PlayStation</button>
                <button>Xbox</button>
                <button>Nintendo</button>
                <button>Mobile</button>
            </div>
            <div class="best-games-list">
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/80x100/?game,cyberpunk" alt="Cyberpunk Adventure">
                    <h3>Cyberpunk Quest</h3>
                    <div class="score">9.5</div>
                    <span class="acclaim">Critically Acclaimed</span>
                    <span class="platform-icon">PC</span>
                    <div class="progress-bar" style="width: 95%;"></div>
                </div>
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/80x100/?game,medieval" alt="Medieval Legend">
                    <h3>Medieval Legend</h3>
                    <div class="score">9.2</div>
                    <span class="acclaim">Fan Favorite</span>
                    <span class="platform-icon">PS5</span>
                    <div class="progress-bar" style="width: 92%;"></div>
                </div>
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/80x100/?game,space" alt="Cosmic Conquerors">
                    <h3>Cosmic Conquerors</h3>
                    <div class="score">8.9</div>
                    <span class="acclaim">Highly Recommended</span>
                    <span class="platform-icon">Xbox</span>
                    <div class="progress-bar" style="width: 89%;"></div>
                </div>
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/80x100/?game,racing" alt="Speed Demon">
                    <h3>Speed Demon</h3>
                    <div class="score">8.7</div>
                    <span class="acclaim">Great Fun!</span>
                    <span class="platform-icon">Switch</span>
                    <div class="progress-bar" style="width: 87%;"></div>
                </div>
            </div>
        </section>

        <section class="featured-games section-padding" id="games">
            <h2 class="section-title">Featured Games</h2>
            <div class="games-grid">
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/600x360/?game,openworld" alt="Open World RPG">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Echoes of Eternity</h3>
                        <p class="game-genre">Open World RPG</p>
                        <div class="game-platforms">
                            <i class="fab fa-windows"></i>
                            <i class="fab fa-playstation"></i>
                            <i class="fab fa-xbox"></i>
                        </div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/600x360/?game,fps" alt="Sci-Fi Shooter">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Galactic Warfare</h3>
                        <p class="game-genre">Sci-Fi FPS</p>
                        <div class="game-platforms">
                            <i class="fab fa-windows"></i>
                            <i class="fab fa-xbox"></i>
                        </div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/600x360/?game,puzzle" alt="Mystery Puzzle">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Enigma Solved</h3>
                        <p class="game-genre">Puzzle / Adventure</p>
                        <div class="game-platforms">
                            <i class="fas fa-mobile-alt"></i>
                            <i class="fab fa-windows"></i>
                        </div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/600x360/?game,sports" alt="Football Simulator">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Ultimate Kickoff</h3>
                        <p class="game-genre">Sports Simulation</p>
                        <div class="game-platforms">
                            <i class="fab fa-playstation"></i>
                            <i class="fab fa-xbox"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="video-features section-padding" id="streams">
            <h2 class="section-title">Latest Game Trailers & Streams</h2>
            <div class="video-grid">
                <div class="video-card">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/PjE2Kj_zJ-o" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3>Upcoming RPG: The Elder Scrolls VI Teaser</h3>
                        <p>Get a glimpse into the next epic adventure from Bethesda Softworks.</p>
                    </div>
                </div>
                <div class="video-card">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/K0GVSb3z3XQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3>Live Stream: Pro Gamer PvP Showdown</h3>
                        <p>Watch professional players battle it out in the ultimate PvP arena.</p>
                    </div>
                </div>
                <div class="video-card">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/SSxL5V41W1s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3>Indie Spotlight: Lumina's Journey</h3>
                        <p>Explore the enchanting world of this beautiful new indie game.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="streamers-section section-padding">
            <h2 class="section-title">Featured Streamers</h2>
            <div class="streamers-grid">
                <div class="streamer-card">
                    <img src="https://source.unsplash.com/random/100x100/?person,gamer,man" alt="Streamer 1" class="streamer-avatar">
                    <h3>GamingGuru</h3>
                    <p>Playing: Valorant, Apex Legends</p>
                    <p>Followers: 1.2M</p>
                </div>
                <div class="streamer-card">
                    <img src="https://source.unsplash.com/random/100x100/?person,gamer,woman" alt="Streamer 2" class="streamer-avatar">
                    <h3>PixelPrincess</h3>
                    <p>Playing: Zelda, Stardew Valley</p>
                    <p>Followers: 850K</p>
                </div>
                <div class="streamer-card">
                    <img src="https://source.unsplash.com/random/100x100/?person,gamer,asian" alt="Streamer 3" class="streamer-avatar">
                    <h3>CodeBreaker</h3>
                    <p>Playing: League of Legends, Dota 2</p>
                    <p>Followers: 980K</p>
                </div>
                <div class="streamer-card">
                    <img src="https://source.unsplash.com/random/100x100/?person,gamer,black" alt="Streamer 4" class="streamer-avatar">
                    <h3>EpicQuestor</h3>
                    <p>Playing: Elden Ring, Baldur's Gate 3</p>
                    <p>Followers: 700K</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About GameVerse</h4>
                <p>Your ultimate platform for discovering new games, watching live streams, and connecting with the gaming community worldwide.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#games">Games</a>
                    <a href="#new-releases">New Releases</a>
                    <a href="#best-games">Top Rated</a>
                    <a href="#streams">Live Streams</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Support</h4>
                <div class="footer-links">
                    <a href="#">FAQ</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-discord"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 GameVerse. All rights reserved.
        </div>
    </footer>

    <script>
        function scrollCarousel(direction) {
            const carousel = document.querySelector('.carousel');
            const itemWidth = carousel.querySelector('.carousel-item').offsetWidth + 40; // Item width + gap
            carousel.scrollBy({
                left: direction * itemWidth,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>