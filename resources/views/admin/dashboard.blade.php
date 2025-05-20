@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Admin Dashboard')

@section('content')
<div class="stats-grid">
    <!-- Stat Cards -->
    <div class="stat-card">
        <h3>Total Pengguna</h3>
        <div class="stat-number">2,548</div>
        <div class="stat-compare">
            <i class="fas fa-arrow-up text-success"></i> 12.5% dari bulan lalu
        </div>
    </div>

    <div class="stat-card">
        <h3>Game Aktif</h3>
        <div class="stat-number">327</div>
        <div class="stat-compare">
            <i class="fas fa-arrow-down text-danger"></i> 3% dari bulan lalu
        </div>
    </div>

    <div class="stat-card">
        <h3>Pendapatan</h3>
        <div class="stat-number">$15,230</div>
        <div class="stat-compare">
            <i class="fas fa-arrow-up text-success"></i> 24% dari bulan lalu
        </div>
    </div>

    <div class="stat-card">
        <h3>Ulasan Baru</h3>
        <div class="stat-number">89</div>
        <div class="stat-compare">
            <i class="fas fa-comments"></i> 45 perlu moderasi
        </div>
    </div>
</div>

<div class="chart-container">
    <canvas id="performanceChart"></canvas>
</div>

<div class="data-table">
    <div class="table-header">
        <h3>Aktivitas Terbaru</h3>
        <a href="#" class="btn-view-all">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Pengguna</th>
                <th>Aktivitas</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/40" alt="User" class="user-avatar">
                        <div class="user-details">
                            <div class="user-name">John Doe</div>
                            <div class="user-role">Administrator</div>
                        </div>
                    </div>
                </td>
                <td>Menambahkan game baru "Cyber Revolution"</td>
                <td>15 Menit lalu</td>
                <td><span class="status-success">Berhasil</span></td>
            </tr>
            <tr>
                <td>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/40" alt="User" class="user-avatar">
                        <div class="user-details">
                            <div class="user-name">Jane Smith</div>
                            <div class="user-role">Moderator</div>
                        </div>
                    </div>
                </td>
                <td>Memperbarui halaman pembayaran</td>
                <td>1 Jam lalu</td>
                <td><span class="status-pending">Dalam Proses</span></td>
            </tr>
            <tr>
                <td>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/40" alt="User" class="user-avatar">
                        <div class="user-details">
                            <div class="user-name">System</div>
                            <div class="user-role">Automated</div>
                        </div>
                    </div>
                </td>
                <td>Backup database harian</td>
                <td>3 Jam lalu</td>
                <td><span class="status-success">Selesai</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    // Performance Chart
    const ctx = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pendapatan',
                data: [6500, 8900, 12000, 10500, 15230, 14300],
                backgroundColor: 'rgba(112,0,255,0.8)',
                borderColor: 'var(--accent)',
                borderWidth: 2
            },
            {
                label: 'Pengguna Baru',
                data: [120, 180, 254, 198, 312, 285],
                backgroundColor: 'rgba(0,255,148,0.8)',
                borderColor: 'var(--primary)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'var(--light)'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'var(--light)',
                        callback: function(value) {
                            return 'Rp' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                    },
                    grid: {
                        color: 'rgba(245,243,255,0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'var(--light)'
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endsection