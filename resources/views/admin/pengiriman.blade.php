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
                                <td><a class="btn" data-bs-toggle="offcanvas" href="#{{ $belum->id }}" role="button"
                                        aria-controls="offcanvasStart">
                                        Detail
                                    </a></td>
                                <div class="offcanvas offcanvas-start" tabindex="-1" id="{{ $belum->id }}"
                                    aria-labelledby="offcanvasStartLabel">
                                    <div class="offcanvas-header">
                                        <h2 class="offcanvas-title" id="offcanvasStartLabel">Detail pesanan : {{ $belum->id }}</h2>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div>
                                            <ul>
                                                <li><h3 class="text-secondary"> Nama pembeli : {{ $belum->penerima_name }}</h3></li>
                                                <li><h3 class="text-secondary"> Nomor Wa : {{ $belum->phone_number }} <a target="_blank" class="btn btn-warning" href="https://wa.me/{{ $belum->phone_number }}">Hubungi</a></h3></li>
                                                <li><h3 class="text-secondary">Alamat : </h3> <textarea class="form-control" disabled> {{ $belum->alamat }}</textarea></li>
                                                <li><h3 class="text-secondary"> Status : {{ $belum->status }}</h3></li>
                                                <li><h3 class="text-secondary"> Maps :  <a target="_blank" class="btn btn-warning" href="{{ $belum->maps }}">Maps</a></h3></li>
                                            </ul>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                                                Close offcanvas
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
                                <td><a class="btn" data-bs-toggle="offcanvas" href="#offcanvasStart" role="button"
                                        aria-controls="offcanvasStart">
                                        Toggle start offcanvas
                                    </a></td>

                                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart"
                                    aria-labelledby="offcanvasStartLabel">
                                    <div class="offcanvas-header">
                                        <h2 class="offcanvas-title" id="offcanvasStartLabel">Start offcanvas</h2>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea
                                            est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus,
                                            nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                                                Close offcanvas
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
