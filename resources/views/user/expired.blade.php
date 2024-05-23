<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Expired</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Pembayaran Expired!</h4>
            <p>Waktu untuk melakukan pembayaran telah habis.</p>
            <hr>
            <p class="mb-0">Silakan melakukan pembayaran kembali atau hubungi layanan pelanggan untuk bantuan.</p>
            <a href="{{ route('user.index') }}" class="btn btn-success mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
