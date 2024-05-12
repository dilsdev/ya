<div>
    <div class="container">
        <h4>Menu</h4>
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

        <div class="mb-3 input-icon">
            <input type="text" value="" class="form-control" placeholder="Search…">
            <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </span>
        </div>
        <div class="row row-cols-2 row-cols-sm-2">
             @if ($menus)
        @foreach ($menus as $menu)
            <div class="mb-4 col">
                <div class="card" style="">
                        <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
                        <div class="card-body">
                            <img class="mb-2" src="{{ asset('/storage/menu/' . $menu->image) }}" alt=""
                                style="width: 100%; height: 170px; object-fit: cover;">
                            <h4 class="card-text">{{ $menu->nama }}</h4>
                            <p class="card-text">Rp. {{ $menu->harga }}</p>
                            <button wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info"
                        style="float: right;">+card</button>
                        </div>
                    </div>
            </div>
        @endforeach
        @endif
    </div>
    </div>

</div>
