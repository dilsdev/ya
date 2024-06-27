<div>
    {{-- In work, do what you enjoy. --}}
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
                                <td>Rp{{ number_format($item->subtotal_harga, 0, ',', '.') }}</td>
                            </tr>
        
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex" style="justify-content: space-between">
                <button wire:click='pindah' class="btn btn-warning">kembali</button>
                @if ($status == 'di proses')
                <div class="ml-auto">
                    <button class="btn btn-warning" wire:click='selesai({{ $id }})'>selesai</button>
                </div>
                @elseif ($status == 'di pending')
                <div class="ml-auto">
                    <button class="btn btn-danger" wire:click='tolak({{ $id }})'>tolak</button>
                    <button class="btn btn-primary" wire:click='terima({{ $id }})'>terima</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
