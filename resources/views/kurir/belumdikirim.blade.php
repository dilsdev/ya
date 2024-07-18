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
                        @foreach ($belumdikirim as $key => $belum)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $belum->penerima_name }}</td>
                                <td>{{ $belum->pengirim_name }}</td>
                                <td>{{ $belum->status }}</td>
                                <td><a class="btn" href="detailpengiriman/{{ $belum->id_pesanan }}">
                                        Detail
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
