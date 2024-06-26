<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="Aplikasi pembelian makanan atau minuman online dari Cafe SMKN 6 JEMBER">
    <title>Cafe SMKN 6 JEMBER.</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/logo.png') }}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
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
