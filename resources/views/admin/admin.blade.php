<div>
    <div class="container-xl mt-4">
        <h4>Daftar admin</h4>
        <div class="m-2 input-icon">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Cari admin...">
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
                        @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->nomor_telepon }}</td>
                            @if($admin->id != $min->id)
                                <td><button class="btn btn-danger" wire:click="hentikanadmin({{  $admin->id}})">hapus admin</button></td>
                                @else
                                <td><button class="btn btn-danger disable" disable>hapus admin</button></td>
                            @endif
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
