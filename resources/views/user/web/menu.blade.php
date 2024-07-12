<div>
    <div class="container">
        <div class="mb-2 row">
            <div class="m-2 mr-3 col-1">
                <a wire:navigate href="{{ route('web.menu', 'all') }}" class="col-auto"><span class="shadow-none avatar"
                        style="background-image: url({{ asset('./asset/food.png') }})"></span></a>
            </div>
            <div class="m-2 col-1">
                <a wire:navigate href="{{ route('web.menu', 'makanan') }}" class="col-auto"><span
                        class="shadow-none avatar"
                        style="background-image: url({{ asset('./asset/makanan.png') }})"></span></a>
            </div>
            <div class="m-2 col-1">
                <a wire:navigate href="{{ route('web.menu', 'minuman') }}" class="col-auto"><span
                        class="shadow-none avatar"
                        style="background-image: url({{ asset('./asset/minuman.png') }})"></span></a>
            </div>
        </div>
        <div class="input-icon">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Cari menu...">
            <span wire:loading.class.remove="opacity-0" class="input-icon-addon opacity-0">
                <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
            </span>
        </div>
        @if(strlen($this->search) >= 1)
            <div style="background-color: white; z-index:1; width: 60vw;" class=" mt-1 shadow-lg position-absolute">
                @foreach($results as $menu)
                        <div class=" m-1 p-1 d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">{{ ucwords($menu->nama) }} Rp{{ number_format($menu->harga, 0, ',', '.') }}</h6>
                                <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info"
                                    style="float: right;">+card</button>
                        </div>
                        
                @endforeach
            </div>
        @endif
        <div class="d-flex" style="flex-wrap: wrap;">
            @foreach ($menus as $menu)
                <div class="m-2 card" style="max-width: 190px;">
                    <div class="card-body">
                        <img class="mb-2" src="{{ asset('/storage/menu/' . $menu->image) }}" alt=""
                            style="width: 140px; height: 160px; object-fit: cover;">
                        <h4 class="card-text">{{ $menu->nama }}</h4>
                        <p class="card-text">Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
                            @if ($menu->status == 'ready')
                            <button wire:loading.attr="disabled" wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info" style="float: right;">+card</button>
                            @else
                            <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                            @endif                    </div>
                </div>
            @endforeach
            @if ($menusnot)
        @foreach ($menusnot as $menunot)
        <div class="m-2 card" style="max-width: 190px;">
                    <div class="card-body">
                        <img class="mb-2" src="{{ asset('/storage/menu/' . $menunot->image) }}" alt=""
                            style="width: 140px; height: 160px; object-fit: cover;">
                        <h4 class="card-text">{{ $menunot->nama }}</h4>
                        <p class="card-text">Rp{{ number_format($menunot->harga, 0, ',', '.') }}</p>
                        <p class="btn btn-danger disabled" style="float: right;">not ready</p>              </div>
                </div>
        @endforeach
        @endif
        </div>
    </div>
</div>
