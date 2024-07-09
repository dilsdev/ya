<div>
    <div class="container-xl">
        <a href="{{ route('admin.tambahmenu') }}" class="btn btn-warning mb-3">
            Tambah menu
        </a>

        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-secondary">
                                    {{ $menu->nama }}
                                </td>
                                <td class="text-secondary">{{ $menu->deskripsi }}</td>
                                <td class="text-secondary">
                                    Rp.{{ number_format($menu->harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if ($menu->status == 'ready')
                                        <button class="btn btn-success"
                                            wire:click='updatestatus({{ $menu->id }})'>{{ $menu->status }}</button>
                                    @else
                                        <button class="btn btn-danger"
                                            wire:click='updatestatus({{ $menu->id }})'>{{ $menu->status }}</button>
                                    @endif
                                </td>
                                <td>
                                    <a wire:navigate href="/admin/menu/edit/{{ $menu->id }}"
                                        class="btn btn-primary">EDIT</a>
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                        wire:click='destroy({{ $menu->id }})'>Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
