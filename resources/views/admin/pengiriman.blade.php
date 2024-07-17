<div>
    <div class="container-xl">
        <h4>Belum di kirim</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pengirim</th>
                            <th>Status</th>
                            <th>Detail</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($belumdikirim as $key => $belum)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $belum->penerima_name }}</td>
                                <td>{{ $belum->pengirim_name }}</td>
                                <td>{{ $belum->status }}</td>
                                <td><a class="btn" href="detailpengiriman/{{ $belum->id_pesanan }}">
                                        Detail
                                </a></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-xl mt-4">
        <h4>Sudah di kirim</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pengirim</th>
                            <th>Status</th>
                            <th>Detail</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($sudahdikirim as $key => $sudah)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sudah->penerima_name }}</td>
                                <td>{{ $sudah->pengirim_name }}</td>
                                <td>{{ $sudah->status }}</td>
                                <td><a class="btn" href="detailpengiriman/{{ $sudah->id_pesanan }}">
                                    Detail
                            </a></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- {{ $sudahdikirim }}
    {{ $belumdikirim }} --}}
</div>
