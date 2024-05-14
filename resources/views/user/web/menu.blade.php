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
        <div class="d-flex" style="flex-wrap: wrap;">
            @foreach ($menus as $menu)
                <div class="m-2 card" style="max-width: 190px;">
                    <div class="card-body">
                        <img class="mb-2" src="{{ asset('/storage/menu/' . $menu->image) }}" alt=""
                            style="width: 140px; height: 160px; object-fit: cover;">
                        <h4 class="card-text">{{ $menu->nama }}</h4>
                        <p class="card-text">Rp. {{ $menu->harga }}</p>
                            @if ($menu->status == 'ready')
                            <button wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info" style="float: right;">+card</button>
                            @else
                            <button disabled class="btn btn-danger" style="float: right;">not ready</button>
                            @endif                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
