<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Pembayaran untuk <i>{{ $pesanan[0]->name }}</i> Tgl pesan: {{ $pesanan[0]->tanggal_pesan }}</h3>
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
                <form wire:submit="store">
                    <div class="mb-3">
                        <label for="bayar" class="form-label">Nominal</label>
                        <input
                            type="number"
                            class="form-control"
                            name="bayar"
                            id="bayar"
                            aria-describedby="helpId"
                            wire:model.live="bayar"
                            min="0"
                        />
                        <small id="helpId" class="form-text text-muted">Nominal harus lebih atau sama dari Rp{{ number_format($pesanan[0]->total_harga, 0, ',', '.') }}</small>
                    </div>
                    <div class="mb-3">
                        @if ($bayar >= 1)
                        <h4>Bayar = Rp{{ number_format($bayar, 0, ',', '.') }}</h4>
                        @endif
                        <h4>Kembalian = Rp{{ number_format($kembalian, 0, ',', '.') }}</h4>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info" type="submit">bayar</button>
                        <a href="{{ route('user.myorder') }}" class="btn btn-warning">kembali</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
