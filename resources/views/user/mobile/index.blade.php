<div class="container">
    <div class="m-2 input-icon">
        <input type="text" class="form-control" wire:model.live="search" placeholder="Cari menu...">
        <span wire:loading.class.remove="opacity-0" class="input-icon-addon opacity-0">
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
        </span>
    </div>
    @if (strlen($this->search) >= 1)
        <div style="background-color: white; z-index:1; width: 95vw " class="m-0 mt-1 shadow-lg position-absolute">
            @foreach ($results as $menu)
                <div class=" m-1 p-1 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ ucwords($menu->nama) }} Rp{{ number_format($menu->harga, 0, ',', '.') }}</h6>
                        <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $menu->id }})"
                            class="btn btn-info" style="float: right;">+card</button>
                </div>
            @endforeach
        </div>
    @endif
    <div class="mb-2 row">
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('user.menu', 'all') }}" class="col-auto"><span class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/food.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('user.menu', 'makanan') }}" class="col-auto"><span
                    class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/makanan.png') }})"></span></a>
        </div>
        <div class="m-2 col-2">
            <a wire:navigate href="{{ route('user.menu', 'minuman') }}" class="col-auto"><span
                    class="shadow-none avatar"
                    style="background-image: url({{ asset('./asset/minuman.png') }})"></span></a>
        </div>

    </div>
    <div class="border img-responsive img-responsive-3x1 rounded-3"
        style="background-image: url({{ asset('/storage/rekomendasi/' . $rekomendasi[0]->image) }})">
    </div>
    <div class="mt-2 row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Rekomendasi makanan
            </h2>
        </div>
    </div>
    <div class="mt-2 d-flex"
        style="width: 100%; overflow-y: hidden; overflow-x: auto; white-space: nowrap; /* Menyebabkan elemen-elemen fleksibel tetap dalam satu baris */">

        @foreach ($makanans as $makanan)
            <div class="m-2 card" style="min-width: 180px;">
                <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
                <div class="card-body">
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $makanan->image) }}"
                        alt="" style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $makanan->nama }}</h4>
                    <p class="card-text">Rp. {{ $makanan->harga }}</p>
                </div>
                <div class="card-footer">
                    @if ($makanan->status == 'ready')
                        <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $makanan->id }})"
                            class="btn btn-info" style="float: right;">+card</button>
                    @else
                        <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                    @endif
                </div>
            </div>
        @endforeach
        <!-- Tambahkan lebih banyak kartu di sini -->
    </div>
    <div class="mt-2 row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Rekomendasi minuman
            </h2>
        </div>
    </div>
    <div class="mt-2 d-flex"
        style="width: 100%; overflow-y: hidden; overflow-x: auto; white-space: nowrap; /* Menyebabkan elemen-elemen fleksibel tetap dalam satu baris */">

        @foreach ($minumans as $minuman)
            <div class="m-2 card" style="min-width: 180px;">
                <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
                <div class="card-body">
                    <img loading="lazy" class="mb-2" src="{{ asset('/storage/menu/' . $minuman->image) }}"
                        alt="" style="width: 140px; height: 190px; object-fit: cover;">
                    <h4 class="card-text">{{ $minuman->nama }}</h4>
                    <p class="card-text">Rp. {{ $minuman->harga }}</p>
                </div>
                <div class="card-footer">
                    @if ($minuman->status == 'ready')
                        <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $minuman->id }})"
                            class="btn btn-info" style="float: right;">+card</button>
                    @else
                        <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
