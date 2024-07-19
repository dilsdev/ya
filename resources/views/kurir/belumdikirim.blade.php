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
                            <th>Aksi</th>
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
                                <td><button class="btn" wire:click="antar({{ $belum->id }})">
                                        Antar sekarang
                                </button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
