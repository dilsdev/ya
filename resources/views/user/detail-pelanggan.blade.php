<!doctype html>
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
        
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>detail</h3>
                </div>
                <div class="card-body">
                    <table div class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>Rp{{ number_format(($item->harga*$item->jumlah), 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="checkoutpelanggan" method="post">
                        @csrf
                        <input type="hidden" name="pesan" value="{{ $pesan }}">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude"  name="longitude">
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">No wa (aktif)</label>
                            <input
                                type="number"
                                class="form-control"
                                name="phone_number"
                                id="phone_number"
                                placeholder="08xxxxxxxx"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" required rows="3"></textarea>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('user.unpaid') }}" class="btn btn-warning">kembali</a>
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
    if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
           document.getElementById('latitude').value = position.coords.latitude;
           document.getElementById('longitude').value = position.coords.longitude;
       }, function(error) {
           alert('Izinkan kami mengakses lokasi anda untuk pengiriman makanan.');
           navigator.geolocation.getCurrentPosition(function(position) {
               document.getElementById('latitude').value = position.coords.latitude;
               document.getElementById('longitude').value = position.coords.longitude;
           }, function(error) {
               alert(`Tidak dapat mengakses lokasi anda. \n Izinkan lokasi dan refresh halaman`);
           });
       });
   } else {
       alert('Geolocation tidak didukung oleh browser ini.');
   }
   </script>
        
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
