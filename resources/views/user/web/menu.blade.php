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
        @if($message)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        {{ $message }}
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        <div class="d-flex" style="flex-wrap: wrap;">
            @foreach ($menus as $menu)
                <div class="m-2 card" style="max-width: 190px;">
                    <div class="card-body">
                        <img class="mb-2" src="{{ asset('/storage/menu/' . $menu->image) }}" alt=""
                            style="width: 140px; height: 160px; object-fit: cover;">
                        <h4 class="card-text">{{ $menu->nama }}</h4>
                        <p class="card-text">Rp. {{ $menu->harga }}</p>
                        <button wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info"
                            style="float: right;">+card</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
