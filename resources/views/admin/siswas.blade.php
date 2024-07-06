<div>
    <div class="container-xl">
        <h4>Daftar siswa</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nisn</th>
                            {{-- <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Foto kertu </th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $item->nama_lengkap }}
                                </td>
                                <td>{{ $item->nisn }}</td>
                                {{-- <td>
                                    {{ $item->kelas }}
                                </td>
                                <td>
                                    {{ $item->jurusan }}
                                </td>
                                <td>
                                    <a data-fslightbox="gallery" target="_blank" href="{{ asset('storage/kartu_peserta/' . $item->image_kp) }}">
                                        <div class="img-responsive" style="background-image: url('{{ asset('storage/kartu_peserta/' . $item->image_kp) }}')"></div>
                                    </a>
                                </td> --}}
                                <td>
                                    <a href="/admin/detailsiswa/{{ $item->id }}" class="btn btn-warning">Detail</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
