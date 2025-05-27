@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Admin Dashboard')

@push('styles')
<style>
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 2rem;
    }
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
    .chart-container {
        background: rgba(255,255,255,0.05);
        padding: 1.5rem;
        border-radius: 12px;
        margin-top: 2rem;
    }
    .status-success {
        color: #00FF94;
        font-weight: bold;
    }
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
@endpush

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="admin-header">
        <h1>Admin Dashboard</h1>
        <div class="header-right">
            <div class="search">
                <input type="text" placeholder="Search...">
            </div>
            <div class="user-profile">
                <img src="{{ asset('images/avatar.png') }}" alt="Profile" class="avatar" style="width:40px; border-radius:50%;">
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
                <!-- Tambahkan baris lain sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<script src="https://kit.fontawesome.com/your-kit-code.js"></script>
@endpush