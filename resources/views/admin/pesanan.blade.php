<div>
    <div class="container-xl">
        <h4>Pesanan</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Totalw  </th>
                            <th>Dibayar</th>
                            <th>Metode</th>
                            <th>Detail</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody wire:poll.3s>
                        @foreach ($pesanans as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-secondary">
                                    {{ $item->name }}
                                </td>
                                <td class="text-secondary">{{ $item->tanggal_pesan }}</td>
                                <td class="text-secondary">
                                    Rp.{{ number_format($item->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if ($item->status_bayar == "di bayar")
                                        dibayar
                                    @elseif ($item->status_bayar == "belum bayar")
                                        belum
                                    @else
                                    error
                                    @endif
                                </td>
                                <td>
                                    {{ $item->metode_pembayaran }}
                                </td>
                                <td>
                                    <a class="btn btn-warning" href=" {{ route('admin.detail', [$item->id, 'admin.pesanan']) }}">Detail</a>
                                </td>
                                {{-- <td>
                                    <button class="btn btn-warning"
                                        wire:click='terima({{ $item->id }})'>terima</button>
                                    <button class="btn btn-danger"
                                        wire:click='tolak({{ $item->id }})'>tolak</button>
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
