<div>
    <div class="container-xl">
        <h4>Pesanan sudah bayar</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Total harga</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
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
                                    Rp.{{ number_format($item->bayar, 0, ',', '.') }}
                                </td>
                                <td>
                                    Rp.{{ number_format($item->kembalian, 0, ',', '.') }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.pembayaran') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button type="submit" class="btn btn-primary">bayar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h4>Pesanan sudah bayar</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Total harga</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selesais as $key => $selesai)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-secondary">
                                    {{ $selesai->name }}
                                </td>
                                <td class="text-secondary">{{ $selesai->tanggal_pesan }}</td>
                                <td class="text-secondary">
                                    Rp.{{ number_format($selesai->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    Rp.{{ number_format($selesai->bayar, 0, ',', '.') }}
                                </td>
                                <td>
                                    Rp.{{ number_format($selesai->kembalian, 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href=" {{ route('admin.detail', [$selesai->id ,'admin.pesananselesai']) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
