<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Iklan - nexioarena</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #7000FF;
            --secondary: #FF00E5;
            --accent: #00FF94;
            --dark: #0A041C;
            --light: #F5F3FF;
            --card-bg: #1a0b3a;
            --success: #00c853;
            --warning: #ffab00;
            --error: #ff1744;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, var(--dark), #160838);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.6;
            padding: 2rem;
        }

        .payment-container {
            background: rgba(26, 11, 58, 0.8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(112, 0, 255, 0.3);
            padding: 3rem;
            max-width: 600px;
            width: 100%;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .payment-header {
            margin-bottom: 2.5rem;
        }

        .payment-logo {
            font-family: 'Oxanium', sans-serif;
            font-size: 2.2rem;
            color: var(--accent);
            letter-spacing: 2px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .payment-logo i {
            color: var(--primary);
        }

        .payment-title {
            font-family: 'Oxanium', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--accent);
        }

        .payment-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        .payment-details {
            background: rgba(10, 4, 28, 0.5);
            border-radius: 12px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: left;
            border: 1px solid rgba(112, 0, 255, 0.2);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(112, 0, 255, 0.1);
        }

        .detail-label {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            text-align: right;
        }

        .price {
            font-size: 1.8rem;
            color: var(--accent);
            font-weight: 700;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 5px 15px rgba(112, 0, 255, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(112, 0, 255, 0.6);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .payment-method {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 1rem;
            min-width: 100px;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            background: rgba(112, 0, 255, 0.2);
            transform: translateY(-5px);
        }

        .payment-method i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--accent);
        }

        .error-message {
            background: rgba(255, 23, 68, 0.15);
            border: 1px solid var(--error);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .error-message i {
            color: var(--error);
            font-size: 1.5rem;
        }

        .payment-footer {
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .payment-container {
                padding: 2rem 1.5rem;
            }
            
            .payment-title {
                font-size: 1.5rem;
            }
            
            .detail-item {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .detail-value {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">
            <div class="payment-logo">
                <i class="fas fa-gamepad"></i>
                nexioarena
            </div>
            <h1 class="payment-title">Pembayaran Iklan</h1>
            <p class="payment-subtitle">Selesaikan pembayaran untuk mempublikasikan iklan Anda</p>
        </div>

        <div class="payment-details">
            <div class="detail-item">
                <span class="detail-label">Judul Iklan:</span>
                <span class="detail-value">{{ $iklan->judul }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Durasi:</span>
                <span class="detail-value">7 Hari</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Tanggal Mulai:</span>
                <span class="detail-value">15 Juni 2023</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Total Pembayaran:</span>
                <span class="detail-value price">Rp{{ number_format($iklan->harga) }}</span>
            </div>
        </div>

        <div class="payment-methods">
            <div class="payment-method">
                <i class="fab fa-cc-visa"></i>
                <div>VISA</div>
            </div>
            <div class="payment-method">
                <i class="fab fa-cc-mastercard"></i>
                <div>Mastercard</div>
            </div>
            <div class="payment-method">
                <i class="fab fa-cc-paypal"></i>
                <div>PayPal</div>
            </div>
            <div class="payment-method">
                <i class="fas fa-university"></i>
                <div>Bank Transfer</div>
            </div>
        </div>

        @if($iklan->snap_token)
            <button id="pay-button" class="btn btn-primary">
                <i class="fas fa-credit-card"></i> Lanjutkan Pembayaran
            </button>
            
            <p class="payment-footer">
                Pembayaran aman dan terenkripsi. Kami tidak menyimpan detail kartu Anda.
            </p>
            
            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <script type="text/javascript">
                document.getElementById('pay-button').onclick = function () {
                    snap.pay('{{ $iklan->snap_token }}', {
                        onSuccess: function(result) {
                            alert("Pembayaran sukses! Iklan Anda akan segera dipublikasikan.");
                            window.location.href = '{{ route("user.iklans.index") }}';
                        },
                        onPending: function(result) {
                            alert("Menunggu pembayaran... Silakan selesaikan pembayaran Anda.");
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal. Silakan coba lagi atau gunakan metode pembayaran lain.");
                        },
                        onClose: function() {
                            alert("Anda menutup halaman pembayaran. Silakan lanjutkan pembayaran jika perlu.");
                        }
                    });
                };
            </script>
        @else
            <div class="error-message">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <h3>Token Pembayaran Tidak Tersedia</h3>
                    <p>Silakan hubungi tim dukungan pelanggan kami untuk bantuan lebih lanjut.</p>
                </div>
            </div>
            
            <a href="{{ route('user.iklans.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Iklan
            </a>
        @endif
    </div>
</body>
</html>