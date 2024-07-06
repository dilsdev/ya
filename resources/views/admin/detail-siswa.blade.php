<div>
    <div class="card">
        <div class="card-body">
            @foreach ($siswas as $key => $item)
            <div class="mb-3">
                <h3>Name</h3>
                <p>{{ $item->nama_lengkap }}</p>
            </div>
            <div class="mb-3">
                <h3>Nisn</h3>
                <p>{{ $item->nisn }}</p>
            </div>
            <div class="mb-3">
                <h3>Kelas</h3>
                <p>{{ $item->kelas }}</p>
            </div>
            <div class="mb-3">
                <h3>Jurusan</h3>
                <p>{{ $item->jurusan }}</p>
            </div>
            <div class="mb-3">
                <h3>Foto kertu</h3>
                <a data-fslightbox="gallery" target="_blank" href="{{ asset('storage/kartu_peserta/' . $item->image_kp) }}">
                    <div class="img-responsive img-responsive-2x1 rounded-3 border" style="background-image: url('{{ asset('storage/kartu_peserta/' . $item->image_kp) }}')"></div>
                </a>
            </div>
            <div class="card-footer">
                <td>
                    <a href="{{ route('admin.siswa') }}" class="btn btn-warning">Kembali</a>
                </td>
                <td>
                    <button class="btn btn-primary"
                        wire:click='terima({{ $item->id }})'>Setuju</button>
                </td>
            </div>
            @endforeach
        </div>
        
    </div>
</div>
