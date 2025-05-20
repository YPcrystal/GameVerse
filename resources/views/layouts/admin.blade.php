<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVerse - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: var(--dark);
            color: var(--light);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: rgba(10, 4, 28, 0.95);
            padding: 2rem;
            position: fixed;
            height: 100vh;
            border-right: 1px solid rgba(255,255,255,0.1);
        }

        .logo-admin {
            font-family: 'Oxanium', sans-serif;
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 3rem;
            text-align: center;
        }

        .nav-admin {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .nav-link {
            color: var(--light);
            text-decoration: none;
            padding: 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(112,0,255,0.2);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, var(--primary), rgba(112,0,255,0));
            border-left: 4px solid var(--accent);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        /* Header */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255,255,255,0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .stat-card h3 {
            color: var(--accent);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Data Tables */
        .data-table {
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            overflow: hidden;
            margin-top: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        th {
            background: rgba(112,0,255,0.2);
            color: var(--accent);
        }

        /* Charts */
        .chart-container {
            background: rgba(255,255,255,0.05);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .admin-header {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-admin">GAMEVERSE ADMIN</div>
        <nav class="nav-admin">
            <a href="#" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-users"></i>
                Users
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-gamepad"></i>
                Games
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-ad"></i>
                Advertisements
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                Analytics
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-cog"></i>
                Settings
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <div class="header-right">
                <div class="search">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile">
                    <img src="avatar.png" alt="Profile" class="avatar">
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Users</h3>
                <div class="stat-number">1,234</div>
            </div>
            <div class="stat-card">
                <h3>Active Games</h3>
                <div class="stat-number">567</div>
            </div>
            <div class="stat-card">
                <h3>Revenue</h3>
                <div class="stat-number">$12,345</div>
            </div>
            <div class="stat-card">
                <h3>Pending Reviews</h3>
                <div class="stat-number">89</div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <canvas id="mainChart"></canvas>
        </div>

        <!-- Recent Activities Table -->
        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Added new game</td>
                        <td>2024-03-15</td>
                        <td><span class="status-success">Completed</span></td>
                    </tr>
                    <!-- Add more rows -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Sample Chart.js implementation
        const ctx = document.getElementById('mainChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Monthly Users',
                    data: [65, 59, 80, 81, 56, 55],
                    borderColor: '#7000FF',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(112,0,255,0.2)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-kit-code.js"></script>
</body>
</html>