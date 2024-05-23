<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        @if ($transactionStatus == 'settlement')
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Pembayaran Berhasil!</h4>
                <p>Terima kasih! Pembayaran Anda telah berhasil diproses.</p>
                <hr>
                <p class="mb-0">Kode Transaksi: <strong>{{ $orderId }}</strong></p>
                <a href="{{ route('user.index') }}" class="btn btn-success mt-3">Kembali ke Beranda</a>
            </div>
        @elseif ($transactionStatus == 'pending')
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Pembayaran Pending!</h4>
                <p>Pembayaran Anda sedang diproses. Silakan tunggu beberapa saat.</p>
                <hr>
                <p class="mb-0">Kode Transaksi: <strong>{{ $orderId }}</strong></p>
                <a href="{{ route('user.index') }}" class="btn btn-info mt-3">Kembali ke Beranda</a>
            </div>
        @elseif ($transactionStatus == 'deny')
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Pembayaran Ditolak!</h4>
                <p>Maaf, pembayaran Anda ditolak. Silakan coba lagi.</p>
                <hr>
                <p class="mb-0">Jika masalah berlanjut, silakan hubungi layanan pelanggan kami.</p>
                <a href="{{ route('user.index') }}" class="btn btn-danger mt-3">Coba Lagi</a>
            </div>
        @elseif ($transactionStatus == 'cancel')
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Pembayaran Dibatalkan!</h4>
                <p>Pembayaran Anda telah dibatalkan.</p>
                <hr>
                <p class="mb-0">Silakan melakukan pembayaran kembali atau hubungi layanan pelanggan untuk bantuan.</p>
                <a href="{{ route('user.index') }}" class="btn btn-warning mt-3">Lakukan Pembayaran Kembali</a>
            </div>
        @elseif ($transactionStatus == 'expire')
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Pembayaran Expired!</h4>
                <p>Waktu untuk melakukan pembayaran telah habis.</p>
                <hr>
                <p class="mb-0">Silakan melakukan pembayaran kembali atau hubungi layanan pelanggan untuk bantuan.</p>
                <a href="{{ route('user.index') }}" class="btn btn-warning mt-3">Lakukan Pembayaran Kembali</a>
            </div>
        @elseif ($transactionStatus == 'failure')
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Pembayaran Gagal!</h4>
                <p>Maaf, pembayaran Anda tidak berhasil. Silakan coba lagi.</p>
                <hr>
                <p class="mb-0">Jika masalah berlanjut, silakan hubungi layanan pelanggan kami.</p>
                <a href="{{ route('user.index') }}" class="btn btn-danger mt-3">Coba Lagi</a>
            </div>
        @else
            <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading">Status Tidak Diketahui!</h4>
                <p>Status pembayaran tidak dikenali.</p>
                <hr>
                <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
            </div>
        @endif
    </div>
</body>
</html>
