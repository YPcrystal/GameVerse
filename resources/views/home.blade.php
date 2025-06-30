<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nexioarena - Ultimate Gaming Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
            --light-alpha: rgba(245, 243, 255, 0.75);
            --dark-alpha: rgba(10, 4, 28, 0.85);
            --secondary-alpha: rgba(255, 0, 229, 0.2);
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Oxanium', sans-serif;
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
            background: var(--dark-alpha);
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        header.scrolled {
            padding: 0.7rem 5%;
            background: rgba(10, 4, 28, 0.95);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .logo {
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--light-alpha);
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
            color: var(--accent);
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
            background: radial-gradient(circle at 50% 50%, rgba(112,0,255,0.15) 0%, var(--dark) 70%);
            z-index: 0;
            animation: pulse 6s infinite;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 1;
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }

        .hero-content.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .section-title.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* --- STYLING FOR NEW SECTIONS --- */

        /* Features Section */
        .features-grid {
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .feature.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .new-releases-header.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .carousel-item.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .carousel-nav.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .best-games-header.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .best-games-platforms.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .best-games-item.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .game-card.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .video-card.animated {
            opacity: 1;
            transform: translateY(0);
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
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .streamer-card.animated {
            opacity: 1;
            transform: translateY(0);
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

        /* Ad Containers */
        .ad-container {
            background: rgba(112, 0, 255, 0.15);
            border-radius: 15px;
            padding: 2rem;
            margin: 4rem auto;
            text-align: center;
            border: 2px dashed var(--accent);
            max-width: 1000px;
            position: relative;
            overflow: hidden;
        }
        
        .ad-container::before {
            content: "AD SPACE";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            font-weight: 800;
            color: rgba(255,255,255,0.1);
            z-index: 0;
            pointer-events: none;
        }
        
        .ad-container h3 {
            position: relative;
            z-index: 1;
            color: var(--accent);
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        
        .ad-container p {
            position: relative;
            z-index: 1;
            max-width: 600px;
            margin: 0 auto 1.5rem;
            font-family: 'Roboto', sans-serif;
            color: rgba(255,255,255,0.8);
        }
        
        .ad-container .ad-cta {
            position: relative;
            z-index: 1;
            display: inline-block;
            background: var(--gradient);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .ad-container .ad-cta:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(112,0,255,0.4);
        }
        
        .ad-container.small {
            max-width: 800px;
            padding: 1.5rem;
            margin: 3rem auto;
        }
        
        .ad-container.small h3 {
            font-size: 1.5rem;
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
            .ad-container::before {
                font-size: 2rem;
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
            .ad-container {
                padding: 1.5rem;
            }
            .ad-container h3 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">nexioarena</div>
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
        <section class="hero" id="home">
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

        <!-- Ad Space 1 -->
        <div class="ad-container">
            <h3>Special Gaming Gear Discount!</h3>
            <p>Get 25% off on premium gaming peripherals with code GAMER25. Limited time offer!</p>
            <a href="#" class="ad-cta">Shop Now</a>
        </div>

        <section class="features section-padding" id="features">
            <h2 class="section-title">Why nexioarena?</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2.5rem auto; font-size: 1.1rem; font-family: 'Roboto', sans-serif; line-height: 1.7; opacity: 0.9;">
                At nexioarena, we understand your passion for the gaming world. More than just a platform, we are your fellow travelers in exploring the limitless gaming universe. We believe every game has a unique story, and you deserve the best way to discover, experience, and share them. This is why nexioarena exists for you:
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
                @if(isset($newReleases) && count($newReleases))
                    @foreach($newReleases as $game)
                        <div class="carousel-item">
                            <img src="{{ $game->cover_url ?? 'https://via.placeholder.com/300x400?text=No+Image' }}" alt="{{ $game->title ?? 'Game' }}">
                        </div>
                    @endforeach
                @else
                    @for($i=1;$i<=8;$i++)
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/300x400?text=Game+{{$i}}" alt="Game {{$i}}">
                        </div>
                    @endfor
                @endif
            </div>
            <div class="carousel-nav">
                <button onclick="scrollCarousel(-1)">&#8249;</button>
                <button onclick="scrollCarousel(1)">&#8250;</button>
            </div>
        </section>

        <!-- Ad Space 2 -->
        @if(isset($ads[1]))
        <div class="ad-container small">
            <h3>{{ $ads[1]->title }}</h3>
            <p>{{ $ads[1]->description }}</p>
            <a href="{{ $ads[1]->cta_url }}" class="ad-cta">{{ $ads[1]->cta_text }}</a>
        </div>
        @endif

        <section class="best-games section-padding" id="best-games">
            <div class="best-games-header">
                <h2>Top Rated Games</h2>
                <a href="#">VIEW ALL</a>
            </div>
            <div class="best-games-platforms">
                <button class="active" data-platform="all">All Platforms</button>
                <button data-platform="PC">PC</button>
                <button data-platform="PlayStation">PlayStation</button>
                <button data-platform="Xbox">Xbox</button>
                <button data-platform="Nintendo">Nintendo</button>
                <button data-platform="Mobile">Mobile</button>
            </div>
            <div class="best-games-list">
                @if(isset($topRated) && count($topRated))
                    @foreach($topRated as $game)
                    <div class="best-games-item" data-platform="{{ $game->platform }}">
                        <img src="{{ $game->cover_url ?? 'https://via.placeholder.com/80x100?text=No+Image' }}" alt="{{ $game->title ?? 'Game' }}">
                        <h3>{{ $game->title ?? 'Game Title' }}</h3>
                        <div class="score">{{ $game->rating ?? '0.0' }}</div>
                        <span class="acclaim">{{ $game->acclaim ?? 'Acclaim' }}</span>
                        <span class="platform-icon">{{ $game->platform ?? 'Platform' }}</span>
                        <div class="progress-bar" style="width: {{ isset($game->rating) ? $game->rating * 10 : 0 }}%;"></div>
                    </div>
                    @endforeach
                @else
                    @for($i=1;$i<=4;$i++)
                    <div class="best-games-item" data-platform="PC">
                        <img src="https://via.placeholder.com/80x100?text=Game+{{$i}}" alt="Game {{$i}}">
                        <h3>Game Title {{$i}}</h3>
                        <div class="score">9.{{5-$i}}</div>
                        <span class="acclaim">Sample Acclaim</span>
                        <span class="platform-icon">PC</span>
                        <div class="progress-bar" style="width: {{95-$i}}%;"></div>
                    </div>
                    @endfor
                @endif
            </div>
        </section>

        <section class="featured-games section-padding" id="games">
            <h2 class="section-title">Featured Games</h2>
            <div class="games-grid">
                @if(isset($featuredGames) && count($featuredGames))
                    @foreach($featuredGames as $game)
                    <div class="game-card">
                        <div class="game-thumbnail">
                            <img src="{{ $game->cover_url ?? 'https://via.placeholder.com/600x360?text=No+Image' }}" alt="{{ $game->title ?? 'Game' }}">
                        </div>
                        <div class="game-info">
                            <h3 class="game-title">{{ $game->title ?? 'Game Title' }}</h3>
                            <p class="game-genre">{{ $game->genre ?? 'Genre' }}</p>
                            <div class="game-platforms">
                                @if(isset($game->platforms) && is_array($game->platforms))
                                    @foreach($game->platforms as $platform)
                                        @if($platform === 'PC')<i class="fab fa-windows"></i>@endif
                                        @if($platform === 'PlayStation')<i class="fab fa-playstation"></i>@endif
                                        @if($platform === 'Xbox')<i class="fab fa-xbox"></i>@endif
                                        @if($platform === 'Nintendo')<i class="fas fa-gamepad"></i>@endif
                                        @if($platform === 'Mobile')<i class="fas fa-mobile-alt"></i>@endif
                                    @endforeach
                                @else
                                    <i class="fas fa-gamepad"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    @for($i=1;$i<=3;$i++)
                    <div class="game-card">
                        <div class="game-thumbnail" style="position:relative;">
                            <span style="position:absolute;top:10px;left:10px;background:var(--accent);color:var(--dark);font-weight:700;padding:4px 12px;border-radius:8px;font-size:0.95rem;z-index:2;">Featured</span>
                            <img src="https://via.placeholder.com/600x360?text=Game+{{$i}}" alt="Game {{$i}}">
                        </div>
                        <div class="game-info">
                            <h3 class="game-title">Game Title {{$i}}</h3>
                            <p class="game-genre">Genre</p>
                            <div class="game-platforms">
                                <i class="fas fa-gamepad"></i>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        </section>

        <!-- Ad Space 3 -->
        @if(isset($ads[2]))
        <div class="ad-container">
            <h3>{{ $ads[2]->title }}</h3>
            <p>{{ $ads[2]->description }}</p>
            <a href="{{ $ads[2]->cta_url }}" class="ad-cta">{{ $ads[2]->cta_text }}</a>
        </div>
        @endif

        <section class="video-features section-padding" id="streams">
            <h2 class="section-title">Latest Game Trailers & Streams</h2>
            <div class="video-grid">
                @if(isset($videos) && count($videos))
                    @foreach($videos as $video)
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="{{ $video->embed_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h3>{{ $video->title ?? 'Video Title' }}</h3>
                            <p>{{ $video->description ?? 'Video description.' }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h3>Sample Video 1</h3>
                            <p>Sample video description 1.</p>
                        </div>
                    </div>
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/xvFZjo5PgG0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h3>Sample Video 2</h3>
                            <p>Sample video description 2.</p>
                        </div>
                    </div>
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/L_A70c79J7k" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h3>Sample Video 3</h3>
                            <p>Sample video description 3.</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section class="streamers-section section-padding">
            <h2 class="section-title">Featured Streamers</h2>
            <div class="streamers-grid">
                @if(isset($streamers) && count($streamers))
                    @foreach($streamers as $streamer)
                    <div class="streamer-card">
                        <img src="{{ $streamer->avatar_url }}" alt="{{ $streamer->name }}" class="streamer-avatar">
                        <h3>{{ $streamer->name }}</h3>
                        <p>Playing: {{ $streamer->games_played }}</p>
                        <p>Followers: {{ number_format($streamer->followers) }}</p>
                    </div>
                    @endforeach
                @else
                    @for($i=1;$i<=3;$i++)
                    <div class="streamer-card">
                        <img src="https://i.pravatar.cc/100?img={{$i}}" alt="Streamer {{$i}}" class="streamer-avatar">
                        <h3>Streamer {{$i}}</h3>
                        <p>Playing: Game {{$i}}</p>
                        <p>Followers: {{ number_format(1000 * $i) }}</p>
                    </div>
                    @endfor
                @endif
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About nexioarena</h4>
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
            &copy; 2025 nexioarena. All rights reserved.
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Element animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.hero-content, .section-title, .feature, .new-releases-header, .carousel-item, .carousel-nav, .best-games-header, .best-games-platforms, .best-games-item, .game-card, .video-card, .streamer-card');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.classList.add('animated');
                }
            });
        }
        
        // Initialize animations
        window.addEventListener('load', function() {
            // Animate hero content immediately
            document.querySelector('.hero-content').classList.add('animated');
            
            // Set up scroll animation for other elements
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
        });
        
        // Carousel navigation
        function scrollCarousel(direction) {
            const carousel = document.querySelector('.carousel');
            const itemWidth = carousel.querySelector('.carousel-item').offsetWidth + 40 // Item width + gap
            carousel.scrollBy({
                left: direction * itemWidth,
                behavior: 'smooth'
            });
        }
        
        // Platform filter functionality
        document.querySelectorAll('.best-games-platforms button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.best-games-platforms button').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Filter functionality would go here in a real implementation
                // For now, we'll just simulate a filter action
                console.log(`Filtering by: ${this.textContent}`);
            });
        });
        
        // Simulate game data loading
        setTimeout(() => {
            // This would be an API call in a real implementation
            console.log("Game data loaded successfully");
        }, 2000);
    </script>
</body>
</html>