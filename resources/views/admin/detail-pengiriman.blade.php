<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container">
        <div class="card">
            <div class="card-header ">
                <ul>
                    <li><h3 class="text-secondary"> Nama pembeli : {{ $pengiriman->penerima_name }}</h3></li>
                    <li><h3 class="text-secondary" style="display: inline-block"> Nomor Wa : {{ $pengiriman->phone_number }}</h3> <a style="font-size: 1rem;" target="_blank" class="link-opacity-75-hover" href="https://wa.me/{{ $pengiriman->phone_number }}"> Hubungi</a></li>
                    <li><h3 class="text-secondary"> Alamat : </h3> <textarea class="form-control" disabled> {{ $pengiriman->alamat }}</textarea></li>
                    <li><h3 class="text-secondary"> Status pengiriman : {{ $pengiriman->status }}</h3></li>
                    <li><h3 class="text-secondary" style="display: inline-block"> Maps : </h3><a style="font-size: 1rem;" target="_blank" class="link-opacity-75-hover" href="{{ $pengiriman->maps }}"> Maps</a></li>
                </ul>
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
                                <td>Rp{{ number_format($item->subtotal_harga, 0, ',', '.') }}</td>
                            </tr>
        
                        @endforeach
                    </tbody>
                </table>
                <div class="card">
                    <div class="card-body">
                        <p cols="30" rows="10"><b>Pesan</b> : {{ $pengiriman->message }}</p>
                        <h4 class="card-title">Pengirim / Kurir : {{ $pengiriman->pengirim_name }}</h4>
                        <h4 class="card-title">Status pesanan : {{ $pengiriman->status }}</h4>
                        <h4 class="card-title">Status bayar : {{ $pengiriman->status_bayar }}</h4>
                        <h4 class="card-title">Bayar : {{ $pengiriman->bayar }}</h4>
                        <h4 class="card-title">Kembalian : {{ $pengiriman->kembalian }}</h4>
                    </div>
                </div>
                
            </div>
            <div class="card-footer d-flex" style="justify-content: space-between">
                <a href="{{ route('admin.pengiriman') }}" class="btn">kembali</a>
            </div>
        </div>
    </div>
</div>
