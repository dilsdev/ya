<div>
    <div class="container">
        <h4>Barang</h4>
        <div class="row mb-2">
        <div class="col-2 m-2">
            <div class="col-auto"><span class="avatar"
                    style="background-image: url({{ asset('./static/avatars/000m.jpg') }})"></span></div>
        </div>
        <div class="col-2 m-2">
            <div class="col-auto"><span class="avatar"
                    style="background-image: url({{ asset('./static/avatars/000m.jpg') }})"></span></div>
        </div>
        <div class="col-2 m-2">
            <div class="col-auto"><span class="avatar"
                    style="background-image: url({{ asset('./static/avatars/000m.jpg') }})"></span></div>
        </div>
    </div>

          <div class="input-icon mb-3">
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
          <div class="d-flex" style="flex-wrap: wrap">
            @foreach ($menus as $menu)
            <div class="card m-2" style="width: 190px; ">
              <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
              <div class="card-body">
                <img class="mb-2" src="{{ asset('/storage/menu/'.$menu->image) }}" alt=""
                  style="width: 140px; height: 170px; object-fit: cover;">
                <h4 class="card-text">{{ $menu->nama }}</h4>
                <p class="card-text">Rp. {{ $menu->harga }}</p>
                <button class="btn btn-info" style="float: right">+card</button>
              </div>
            </div>
            @endforeach
          </div>
        </div>
    {{-- <button wire:click='render()'>makanan</button> --}}
    <button wire:click='makanan()'>makanan</button>
    <button wire:click='minuman()'>minuman</button>
</div>
