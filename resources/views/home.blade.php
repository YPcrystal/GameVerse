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
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Oxanium', sans-serif;
            background: linear-gradient(135deg, var(--dark) 0%, #1A0A35 100%);
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
            background: rgba(10, 4, 28, 0.95);
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
            color: var(--light);
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
            color: var(--accent); /* Tambahan hover effect warna teks */
        }

        .search-container {
            position: relative;
            width: 300px; /* Sedikit diperkecil agar lebih seimbang */
        }

        .search-input {
            width: 100%;
            padding: 0.9rem 2rem 0.9rem 1.5rem; /* Adjusted padding */
            border: 2px solid rgba(255,255,255,0.15);
            border-radius: 30px;
            background: rgba(255,255,255,0.08);
            color: var(--light);
            font-size: 1rem;
            font-family: 'Roboto', sans-serif; /* Menggunakan Roboto untuk input */
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
            right: 6px; /* Adjusted position */
            top: 50%;
            transform: translateY(-50%);
            background: var(--gradient);
            border: none;
            padding: 0.5rem 1.2rem; /* Adjusted padding */
            border-radius: 20px; /* Adjusted border-radius */
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600; /* Added font weight */
        }

        .search-button:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 0 20px rgba(112,0,255,0.4);
        }
        
        .search-button i { /* Jika ingin menggunakan ikon */
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
            background: radial-gradient(circle at 50% 50%, rgba(112,0,255,0.15) 0%, rgba(10,4,28,0) 70%);
            z-index: 0; /* Diubah agar di bawah konten hero */
            animation: pulse 6s infinite;
        }

        .hero-content {
            max-width: 800px;
            position: relative; /* Pastikan di atas pseudo-element */
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
            font-family: 'Roboto', sans-serif; /* Lebih cocok untuk paragraf */
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
        .section-padding { /* Kelas umum untuk padding section */
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
        
        /* --- STYLING UNTUK SECTION BARU --- */

        /* Features Section (Section Baru) */
        .features {
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
            height: 200px; /* Sesuaikan tinggi iframe */
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

        /* New Releases Section (Section Baru) */
        .new-releases {
            /* Padding sudah diatur oleh .section-padding */
        }
        .new-releases-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }
        .new-releases-header h2 { /* Menggunakan style dari .section-title tapi tidak terpusat */
            font-size: 2.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0; /* Reset margin bottom dari .section-title jika dipakai */
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
            display: grid; /* Sederhana, untuk JS carousel bisa lebih kompleks */
            grid-auto-flow: column;
            grid-auto-columns: calc((100% / 4) - 1.875rem); /* Tampil 4 item, dikurangi gap */
            gap: 2.5rem;
            overflow-x: auto; /* Memungkinkan scroll horizontal */
            padding-bottom: 1.5rem; /* Ruang untuk scrollbar */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .carousel::-webkit-scrollbar { /* Chrome, Safari, Opera */
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
            aspect-ratio: 3/4; /* Jaga rasio aspek gambar */
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


        /* Best Games Section (Section Baru) */
        .best-games {
            /* Padding sudah diatur oleh .section-padding */
        }
        .best-games-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }
         .best-games-header h2 { /* Menggunakan style dari .section-title tapi tidak terpusat */
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
            gap: 1.5rem; /* Lebih rapat dari game-card biasa */
        }
        .best-games-item {
            display: grid;
            grid-template-columns: 80px 1fr auto; /* Kolom untuk gambar, info, skor */
            grid-template-areas: 
                "image title score"
                "image acclaim platform"
                "image progress progress";
            gap: 0.5rem 1.5rem; /* gap baris dan kolom */
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
            height: 100px; /* Tinggi spesifik untuk daftar */
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
            justify-self: end; /* Rata kanan */
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
            justify-self: start; /* Rata kiri */
        }
        .best-games-item .progress-bar {
            grid-area: progress;
            height: 8px;
            background: var(--gradient);
            border-radius: 4px;
            margin-top: 0.5rem;
            width: 100%; /* Skor akan menentukan lebar ini via JS nanti */
        }

        /* --- AKHIR STYLING UNTUK SECTION BARU --- */

        /* Featured Games Section (Sudah Ada) */
        .featured-games {
            /* Padding sudah diatur oleh .section-padding */
        }

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
            padding-bottom: 60%; /* Aspect ratio 5:3 */
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
            font-size: 1.2rem; /* Icon lebih besar */
        }

        /* Video Features Section (Sudah Ada) */
        .video-features {
            background: rgba(0,0,0,0.2);
            /* Padding sudah diatur oleh .section-padding */
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
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
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
        .video-info p { /* Menambahkan style untuk deskripsi video jika ada */
            font-family: 'Roboto', sans-serif;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.8);
        }


        /* Streamers Section (Sudah Ada) */
        .streamers-section {
           /* Padding sudah diatur oleh .section-padding */
        }

        .streamers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .streamer-card {
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            padding: 2rem; /* Penyesuaian padding */
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1); /* Tambah border konsisten */
        }

        .streamer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(112,0,255,0.2);
        }

        .streamer-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 1.5rem; /* Penyesuaian margin */
            border: 3px solid var(--primary);
            object-fit: cover; /* Pastikan gambar avatar pas */
        }
        .streamer-card h3 { /* Nama streamer */
            font-size: 1.4rem;
            color: var(--accent);
            margin-bottom: 0.5rem;
        }
        .streamer-card p { /* Info tambahan streamer */
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
            font-family: 'Roboto', sans-serif;
        }


        /* Footer */
        footer {
            background: var(--dark); /* Lebih gelap agar kontras */
            padding: 5rem 5% 3rem; /* Penyesuaian padding */
            margin-top: 6rem;
            border-top: 1px solid rgba(255,255,255,0.1); /* Garis pemisah halus */
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); /* Penyesuaian minmax */
            gap: 3rem;
            margin-bottom: 3rem; /* Ruang sebelum copyright */
        }

        .footer-section h4 {
            font-size: 1.4rem; /* Sedikit lebih besar */
            margin-bottom: 1.5rem;
            color: var(--accent);
            font-weight: 700; /* Lebih tebal */
        }

        .footer-section p { /* Untuk deskripsi di footer */
            font-family: 'Roboto', sans-serif;
            color: rgba(255,255,255,0.7);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 1rem; /* Penyesuaian margin */
            transition: color 0.3s ease, padding-left 0.3s ease; /* Transisi halus */
            font-family: 'Roboto', sans-serif;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--primary);
            padding-left: 5px; /* Efek indentasi saat hover */
        }

        .social-links {
            display: flex;
            gap: 1.2rem; /* Sedikit lebih lebar */
            margin-top: 1rem; /* Penyesuaian margin */
        }

        .social-links a {
            width: 45px; /* Sedikit lebih besar */
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light); /* Warna icon lebih terang */
            font-size: 1.2rem; /* Ukuran icon */
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-4px) scale(1.1); /* Efek lebih menonjol */
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
            .carousel { /* Tampil 3 item di tablet */
              grid-auto-columns: calc((100% / 3) - 1.7rem); 
            }
        }

        @media (max-width: 992px) {
            header {
                padding: 1rem 3%;
            }
            .nav-links {
                 display: none; /* Implementasi menu mobile (hamburger) akan dibutuhkan di sini */
            }
            .search-container { /* Sembunyikan search bar default, bisa dipindah ke menu mobile */
                display: none; 
            }

            .hero {
                padding: 120px 5% 5%; /* Kurangi padding atas karena fixed header */
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
            .carousel { /* Tampil 2 item di mobile besar */
              grid-auto-columns: calc((100% / 2) - 1.25rem); 
            }
             .best-games-item {
                grid-template-columns: 60px 1fr auto;
                grid-template-areas: 
                    "image title title"
                    "image score platform"
                    "progress progress progress"; /* Sesuaikan area untuk mobile */
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
                font-size: 2.5rem; /* Lebih kecil lagi */
            }
            .hero p {
                font-size: 1.1rem;
            }
            .cta-container {
                flex-direction: column;
                align-items: center; /* Tombol CTA ditengah */
                gap: 1.5rem;
            }
            .cta {
                width: 90%; /* Tombol CTA lebih lebar */
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
            .carousel { /* Tampil 1 item penuh + sedikit item berikutnya di mobile kecil */
              grid-auto-columns: 80%; 
            }
            .best-games-platforms button {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
            .footer-content {
                grid-template-columns: 1fr; /* Footer stack di mobile */
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
        <nav class="nav-links"> <a href="#home">Home</a>
            <a href="/games">Games</a>
            <a href="/iklans">iklan</a>
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
            <button class="search-button"><i class="fas fa-search"></i></button> </div>
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
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID_23" 
                        title="YouTube video player" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    <h3>Immersive Reviews</h3>
                    <p>Read detailed and engaging reviews from real players.</p>
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
                    <img src="https://source.unsplash.com/random/300x400/?game,fantasy" alt="Game 1">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,scifi" alt="Game 2">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,adventure" alt="Game 3">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,action" alt="Game 4">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,rpg" alt="Game 5">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,strategy" alt="Game 6">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/300x400/?game,sports" alt="Game 7">
                </div>
            </div>
            <div class="carousel-nav">
                <button class="prev" aria-label="Previous Slide">←</button>
                <button class="next" aria-label="Next Slide">→</button>
            </div>
        </section>

        <section class="featured-games section-padding" id="games">
            <h2 class="section-title">Trending Now</h2> <div class="games-grid">
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/800x480/?cyberpunk-game" alt="Cyber Revolution Thumbnail">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Cyber Revolution</h3>
                        <p class="game-genre">Action RPG • Open World</p>
                        <div class="game-platforms">
                            <i class="fab fa-windows" title="Windows"></i>
                            <i class="fab fa-playstation" title="Playstation"></i>
                            <i class="fab fa-xbox" title="Xbox"></i>
                        </div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/800x480/?fantasy-game" alt="Game Thumbnail">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Mystic Realms</h3>
                        <p class="game-genre">MMORPG • Fantasy</p>
                        <div class="game-platforms">
                            <i class="fab fa-windows" title="Windows"></i>
                            <i class="fab fa-apple" title="MacOS"></i>
                        </div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumbnail">
                        <img src="https://source.unsplash.com/random/800x480/?space-game" alt="Game Thumbnail">
                    </div>
                    <div class="game-info">
                        <h3 class="game-title">Galaxy Frontiers</h3>
                        <p class="game-genre">Strategy • Sci-Fi</p>
                        <div class="game-platforms">
                            <i class="fab fa-windows" title="Windows"></i>
                            <i class="fab fa-linux" title="Linux"></i>
                        </div>
                    </div>
                </div>
                 </div>
        </section>

        <section class="best-games section-padding" id="best-games">
            <div class="best-games-header">
                <h2>Best Games By Platform</h2>
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
                    <img src="https://source.unsplash.com/random/160x200/?game,elden-ring" alt="Elden Ring">
                    <h3>1. Elden Ring</h3>
                    <div class="score">96</div>
                    <div class="acclaim">Universal Acclaim</div>
                    <div class="platform-icon">PS5</div>
                    <div class="progress-bar" style="width: 96%;"></div>
                </div>
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/160x200/?game,baldurs-gate" alt="Baldur's Gate 3">
                    <h3>2. Baldur's Gate 3</h3>
                    <div class="score">96</div>
                    <div class="acclaim">Universal Acclaim</div>
                    <div class="platform-icon">PS5</div>
                    <div class="progress-bar" style="width: 96%;"></div>
                </div>
                <div class="best-games-item">
                    <img src="https://source.unsplash.com/random/160x200/?game,zelda" alt="Zelda Game">
                    <h3>3. Legend of Zelda: TotK</h3>
                    <div class="score">95</div>
                    <div class="acclaim">Universal Acclaim</div>
                    <div class="platform-icon">Switch</div>
                    <div class="progress-bar" style="width: 95%;"></div>
                </div>
                 </div>
        </section>


        <section class="video-features section-padding" id="streams"> <h2 class="section-title">Latest Videos & Streams</h2>
            <div class="video-grid">
                <div class="video-card">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/exampleVideo1" title="Gameplay Video 1" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3>Epic Gameplay Montage</h3>
                        <p>Check out these incredible moments from top players.</p>
                    </div>
                </div>
                 <div class="video-card">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/exampleVideo2" title="Gameplay Video 2" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h3>Developer Insights: New Update</h3>
                         <p>The creators discuss upcoming features and changes.</p>
                    </div>
                </div>
                </div>
        </section>

        <section class="streamers-section section-padding">
            <h2 class="section-title">Featured Streamers</h2>
            <div class="streamers-grid">
                <div class="streamer-card">
                    <img src="https://source.unsplash.com/random/100x100/?person,gamer,female" alt="Streamer Avatar" class="streamer-avatar">
                    <h3>NinjaQueen</h3>
                    <p>Pro FPS Player | Daily Streams</p>
                </div>
                <div class="streamer-card">
                     <img src="https://source.unsplash.com/random/100x100/?person,gamer,male" alt="Streamer Avatar" class="streamer-avatar">
                    <h3>CosmicVoyager</h3>
                    <p>Variety Streamer | RPG & Indie Games</p>
                </div>
                 <div class="streamer-card">
                     <img src="https://source.unsplash.com/random/100x100/?person,streamer" alt="Streamer Avatar" class="streamer-avatar">
                    <h3>PixelPioneer</h3>
                    <p>Retro Gaming Expert | Community Playthroughs</p>
                </div>
                </div>
        </section>

    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About GameVerse</h4>
                <p>Your ultimate destination for game reviews, news, and a vibrant community of gamers. Discover, discuss, and dive deep into the world of gaming.</p>
            </div>
            <div class="footer-section">
                <h4>Explore</h4>
                <div class="footer-links">
                    <a href="#games">All Games</a>
                    <a href="#new-releases">New Releases</a>
                    <a href="#">Latest News</a>
                    <a href="#">Game Reviews</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Support</h4>
                <div class="footer-links">
                    <a href="#">Help Center</a>
                    <a href="#">Contact Us</a>
                    <a href="#">FAQ</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Connect</h4>
                <div class="social-links">
                    <a href="#" aria-label="Twitch"><i class="fab fa-twitch"></i></a>
                    <a href="#" aria-label="Discord"><i class="fab fa-discord"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; <script>document.write(new Date().getFullYear())</script> GameVerse. All Rights Reserved. Created by: ShofyAzz with <i class="fas fa-heart" style="color:var(--primary);"></i> for Gamers.
        </div>
    </footer>
    </body>
</html>