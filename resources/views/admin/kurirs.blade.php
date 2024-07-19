<div>
    <div class="container-xl mt-4">
        <h4>Daftar kurir</h4>
        <div class="m-2 input-icon">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Cari kurir...">
            <span wire:loading.class.remove="opacity-0" class="input-icon-addon opacity-0">
                <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
            </span>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kurirs as $key => $kurir)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $kurir->name }}</td>
                                <td>{{ $kurir->email }}</td>
                                <td>{{ $kurir->nomor_telepon }}</td>
                                <td><button class="btn btn-danger" wire:click="hentikankurir({{  $kurir->id }})">hapus kurir</button></td>
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
