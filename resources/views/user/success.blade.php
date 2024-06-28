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
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Pembayaran Berhasil!</h4>
            <p>Terima kasih! Pembayaran Anda telah berhasil diproses.</p>
            <hr>
            <a href="{{ route('user.index') }}" class="btn btn-success mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
