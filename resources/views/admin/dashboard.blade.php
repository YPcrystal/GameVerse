@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 mt-4">
    <!-- Header dengan Gradien -->
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <h1 class="h3 mb-0 text-white">
            <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
        </h1>
        <div class="text-white">
            <i class="fas fa-calendar me-1"></i> 
            <span id="current-date"></span>
        </div>
    </div>

    <!-- Stats Cards dengan Gradien -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="opacity: 0.8;">
                                    Total Pengguna</div>
                                <div class="h2 mb-0 font-weight-bold">1,234</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x" style="opacity: 0.8;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white">
                        <a href="#" class="text-decoration-none small text-primary">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="opacity: 0.8;">
                                    Total Game</div>
                                <div class="h2 mb-0 font-weight-bold">567</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-gamepad fa-2x" style="opacity: 0.8;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white">
                        <a href="#" class="text-decoration-none small text-success">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="opacity: 0.8;">
                                    Total Review</div>
                                <div class="h2 mb-0 font-weight-bold">2,890</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x" style="opacity: 0.8;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white">
                        <a href="#" class="text-decoration-none small text-warning">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="opacity: 0.8;">
                                    Aktivitas Hari Ini</div>
                                <div class="h2 mb-0 font-weight-bold">42</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bell fa-2x" style="opacity: 0.8;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-white">
                        <a href="#" class="text-decoration-none small text-info">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions dengan Desain Kartu Interaktif -->
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: linear-gradient(135deg, #3a4f6a 0%, #1e2b3a 100%);">
                <h6 class="m-0 font-weight-bold text-white">
                    <i class="fas fa-bolt me-2"></i>Aksi Cepat
                </h6>
                <span class="badge bg-white text-primary">4 Menu</span>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="row">
                    <!-- Tambah Pengguna -->
                    <div class="col-md-3 mb-3">
                        <div class="action-card bg-white rounded-4 overflow-hidden h-100 border-0 shadow-sm transition-all hover-shadow-lg">
                            <a href="#" class="text-decoration-none d-block h-100">
                                <div class="action-icon bg-gradient-primary text-center py-4">
                                    <i class="fas fa-user-plus fa-3x text-white"></i>
                                </div>
                                <div class="p-4">
                                    <h5 class="fw-bold mb-2 text-dark">Tambah Pengguna</h5>
                                    <p class="small text-muted mb-0">Buat akun pengguna baru</p>
                                    <div class="action-arrow mt-3 text-primary">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tambah Game -->
                    <div class="col-md-3 mb-3">
                        <div class="action-card bg-white rounded-4 overflow-hidden h-100 border-0 shadow-sm transition-all hover-shadow-lg">
                            <a href="#" class="text-decoration-none d-block h-100">
                                <div class="action-icon bg-gradient-success text-center py-4">
                                    <i class="fas fa-plus-circle fa-3x text-white"></i>
                                </div>
                                <div class="p-4">
                                    <h5 class="fw-bold mb-2 text-dark">Tambah Game</h5>
                                    <p class="small text-muted mb-0">Tambahkan game ke katalog</p>
                                    <div class="action-arrow mt-3 text-success">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Kelola Review -->
                    <div class="col-md-3 mb-3">
                        <div class="action-card bg-white rounded-4 overflow-hidden h-100 border-0 shadow-sm transition-all hover-shadow-lg">
                            <a href="#" class="text-decoration-none d-block h-100">
                                <div class="action-icon bg-gradient-warning text-center py-4">
                                    <i class="fas fa-edit fa-3x text-white"></i>
                                </div>
                                <div class="p-4">
                                    <h5 class="fw-bold mb-2 text-dark">Kelola Review</h5>
                                    <p class="small text-muted mb-0">Moderasi ulasan pengguna</p>
                                    <div class="action-arrow mt-3 text-warning">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Pengaturan -->
                    <div class="col-md-3 mb-3">
                        <div class="action-card bg-white rounded-4 overflow-hidden h-100 border-0 shadow-sm transition-all hover-shadow-lg">
                            <a href="#" class="text-decoration-none d-block h-100">
                                <div class="action-icon bg-gradient-dark text-center py-4">
                                    <i class="fas fa-cog fa-3x text-white"></i>
                                </div>
                                <div class="p-4">
                                    <h5 class="fw-bold mb-2 text-dark">Pengaturan</h5>
                                    <p class="small text-muted mb-0">Konfigurasi sistem</p>
                                    <div class="action-arrow mt-3 text-dark">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Action Card Styles */
    .action-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .action-icon {
        transition: all 0.3s ease;
        background-size: 200% auto;
    }
    
    .action-card:hover .action-icon {
        background-position: right center;
    }
    
    .action-arrow {
        opacity: 0;
        transition: all 0.3s ease;
        display: inline-block;
        transform: translateX(-10px);
    }
    
    .action-card:hover .action-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* Gradient Backgrounds */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
    }
    
    .bg-gradient-dark {
        background: linear-gradient(135deg, #434343 0%, #000000 100%);
    }
    
    /* Hover Effects */
    .hover-shadow-lg {
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .hover-shadow-lg:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
    
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush


    <!-- Recent Activity dengan Glassmorphism Effect -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 15px; backdrop-filter: blur(10px); background-color: rgba(255,255,255,0.8);">
                <div class="card-header border-0 py-3" style="background: linear-gradient(to right, #f5f7fa, #c3cfe2); border-radius: 15px 15px 0 0 !important;">
                    <h6 class="m-0 font-weight-bold text-dark">Aktivitas Terkini</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 d-flex align-items-center p-3">
                            <div class="me-3">
                                <div class="icon-circle bg-gradient-primary text-white">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold">Admin</div>
                                <div class="text-muted small">Menambahkan game baru "Cyberpunk 2077"</div>
                                <div class="text-muted small">2 menit yang lalu</div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 d-flex align-items-center p-3">
                            <div class="me-3">
                                <div class="icon-circle bg-gradient-success text-white">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold">User123</div>
                                <div class="text-muted small">Memberikan review untuk "The Witcher 3"</div>
                                <div class="text-muted small">15 menit yang lalu</div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 d-flex align-items-center p-3">
                            <div class="me-3">
                                <div class="icon-circle bg-gradient-warning text-white">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold">Moderator</div>
                                <div class="text-muted small">Menghapus review spam</div>
                                <div class="text-muted small">1 jam yang lalu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats dengan Gradien -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header border-0 py-3" style="background: linear-gradient(to right, #f5f7fa, #c3cfe2); border-radius: 15px 15px 0 0 !important;">
                    <h6 class="m-0 font-weight-bold text-dark">Statistik Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="me-2">
                            <i class="fas fa-circle text-gradient-primary"></i> Pengguna
                        </span>
                        <span class="me-2">
                            <i class="fas fa-circle text-gradient-success"></i> Game
                        </span>
                        <span class="me-2">
                            <i class="fas fa-circle text-gradient-warning"></i> Review
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Gradient Button Styles */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-gradient-warning {
        background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-gradient-dark {
        background: linear-gradient(135deg, #434343 0%, #000000 100%);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-gradient-primary:hover, 
    .btn-gradient-success:hover, 
    .btn-gradient-warning:hover,
    .btn-gradient-dark:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(0,0,0,0.1);
    }
    
    /* Icon Circle */
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Text Gradient */
    .text-gradient-primary {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .text-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .text-gradient-warning {
        background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endpush

@push('scripts')
<script>
    // Display current date
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', options);

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pengguna", "Game", "Review"],
            datasets: [{
                data: [35, 30, 35],
                backgroundColor: ['#6a11cb', '#11998e', '#fc4a1a'],
                hoverBackgroundColor: ['#2575fc', '#38ef7d', '#f7b733'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            },
            elements: {
                arc: {
                    borderWidth: 0
                }
            }
        },
    });
</script>
@endpush

@endsection