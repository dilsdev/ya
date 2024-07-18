<div>
    <div class="container-xl mt-4">
        <h4>Daftar users</h4>
        <div class="m-2 input-icon">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Cari users...">
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
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nomor_telepon }}</td>
                                <td><a href="#" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-small{{ $user->id }}">
                                        Aksi
                                    </a></td>
                                    <div class="modal modal-blur fade" id="modal-small{{ $user->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="modal-title">Apa yang anda inginkan?</div>
                                                    <button class="btn btn-danger" wire:click='jadiadmin({{ $user->id }})'>Jadikan admin</button>
                                                    <button class="btn btn-warning" wire:click='jadikurir({{ $user->id }})'>Jadikan kurir</button>                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link link-secondary data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
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
