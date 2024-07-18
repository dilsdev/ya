<div>
    <div class="container-xl mt-4">
        <h4>Perlu di kirim</h4>
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
                        @foreach ($perludikirim as $key => $sudah)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sudah->penerima_name }}</td>
                                <td>{{ $sudah->pengirim_name }}</td>
                                <td>{{ $sudah->status }}</td>
                                <td><a class="btn" href="detailpengiriman/{{ $sudah->id_pesanan }}">
                                        Detail
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- {{ $sudahdikirim }}
    {{ $belumdikirim }} --}}
</div>
