<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="card-body position-relative">
                    <div class="input-icon">
                        <input type="text" class="form-control" wire:model.live="search" placeholder="Cari menu...">
                        <span wire:loading.class.remove="opacity-0" class="input-icon-addon opacity-0">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
                        </span>
                    </div>
                    @if(strlen($this->search) >= 1)
                        <div style="background-color: white; z-index:1;" class=" mt-1 shadow-lg position-absolute w-100">
                            @foreach($results as $menu)
                                    <div class=" m-1 p-1 d-flex justify-content-between align-items-center">
                                        <h3 class="mb-0">{{ ucwords($menu->nama) }} Rp{{ number_format($menu->harga, 0, ',', '.') }}</h6>
                                            <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info"
                                                style="float: right;">+card</button>
                                    </div>
                                    
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2 row">
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'all') }}" class="col-auto"><span class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/food.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'makanan') }}" class="col-auto"><span class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/makanan.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('web.menu', 'minuman') }}" class="col-auto"><span class="shadow-none avatar"
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
                            <img loading="lazy" src="{{ asset('/storage/rekomendasi/' . $r1->image) }}"
                                class="d-block w-100" style="height: 170px; object-fit:cover;" alt="...">
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
                            <img loading="lazy" src="{{ asset('/storage/rekomendasi/' . $r2->image) }}"
                                class="d-block w-100" style="height: 170px; object-fit:cover;" alt="...">
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
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $makanan->image) }}"
                        alt="" style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $makanan->nama }}</h4>
                    <p class="card-text">Rp{{ number_format($makanan->harga, 0, ',', '.') }}</p>
                </div>
                <div class="card-footer">
                    @if ($makanan->status == 'ready')
                        <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $makanan->id }})" class="btn btn-info"
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
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $minuman->image) }}"
                        alt="" style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $minuman->nama }}</h4>
                    <p class="card-text">Rp{{ number_format($minuman->harga, 0, ',', '.') }}</p>
                </div>
                <div class="card-footer">
                    @if ($minuman->status == 'ready')
                        <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $minuman->id }})" class="btn btn-info"
                            style="float: right;">+card</button>
                    @else
                        <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
