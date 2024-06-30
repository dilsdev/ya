<div class="container">
    <div class="input-icon m-2">
        <input type="text" value="" class="form-control" placeholder="Search…">
        <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                <path d="M21 21l-6 -6"></path>
            </svg>
        </span>
    </div>
    <div class="mb-2 row">
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'all') }}" class="col-auto"><span class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/food.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'makanan') }}" class="col-auto"><span
                    class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/makanan.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'minuman') }}" class="col-auto"><span
                    class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/minuman.png') }})"></span></a>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <div id="carouselExampleAutoplaying1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($rekomendasi1 as $r1)
                        <div class="carousel-item @if ($i == 0) active @endif">
                            <img loading="lazy" src="{{ asset('/storage/rekomendasi/' . $r1->image) }}" class="d-block w-100"
                                style="height: 170px; object-fit:cover;" alt="...">
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying1"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying1"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-6">
            <div id="carouselExampleAutoplaying2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $j = 0;
                    @endphp
                    @foreach ($rekomendasi2 as $r2)
                        <div class="carousel-item @if ($j == 0) active @endif">
                            <img loading="lazy" src="{{ asset('/storage/rekomendasi/' . $r2->image) }}" class="d-block w-100"
                                style="height: 170px; object-fit:cover;" alt="...">
                        </div>
                        @php
                            $j++;
                        @endphp
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row g-2 mt-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Rekomendasi makanan
            </h2>
        </div>
    </div>
    <div class="d-flex mt-2"
        style="width: 100%; overflow-y: hidden; overflow-x: auto; white-space: nowrap; /* Menyebabkan elemen-elemen fleksibel tetap dalam satu baris */">

        @foreach ($makanans as $makanan)
            <div class="card m-2" style="min-width: 180px;">
                <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
                <div class="card-body">
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $makanan->image) }}" alt=""
                        style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $makanan->nama }}</h4>
                    <p class="card-text">Rp. {{ $makanan->harga }}</p>
                </div>
                <div class="card-footer">
                    @if ($makanan->status == 'ready')
                        <button wire:click="addKeranjang({{ $makanan->id }})" class="btn btn-info"
                            style="float: right;">+card</button>
                    @else
                        <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                    @endif
                </div>
            </div>
        @endforeach
        <!-- Tambahkan lebih banyak kartu di sini -->
    </div>
    <div class="row g-2 mt-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Rekomendasi minuman
            </h2>
        </div>
    </div>
    <div class="d-flex mt-2"
        style="width: 100%; overflow-y: hidden; overflow-x: auto; white-space: nowrap; /* Menyebabkan elemen-elemen fleksibel tetap dalam satu baris */">

        @foreach ($minumans as $minuman)
            <div class="card m-2" style="min-width: 180px;">
                <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
                <div class="card-body">
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $minuman->image) }}" alt=""
                        style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $minuman->nama }}</h4>
                    <p class="card-text">Rp. {{ $minuman->harga }}</p>
                </div>
                <div class="card-footer">
                    @if ($minuman->status == 'ready')
                        <button wire:click="addKeranjang({{ $minuman->id }})" class="btn btn-info"
                            style="float: right;">+card</button>
                    @else
                        <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
