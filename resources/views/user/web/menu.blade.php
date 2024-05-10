<div>
     <div class="container d-flex" style="flex-wrap: wrap;">
         @foreach ($menus as $menu)
    <div class="m-2 card" style="max-width: 190px;">
     <!-- Tambahkan kelas 'mr-2' untuk memberi jarak antar kartu -->
     <div class="card-body">
      <img class="mb-2" src="{{ asset('/storage/menu/'.$menu->image) }}" alt="" style="width: 140px; height: 160px; object-fit: cover;">
      <h4 class="card-text">{{ $menu->nama }}</h4>
      <p class="card-text">Rp. {{ $menu->harga }}</p>
      <button wire:click="addKeranjang({{ $menu->id }})" class="btn btn-info" style="float: right;">+card</button>
     </div>
    </div>
    @endforeach
   </div>
    {{-- <button wire:click='render()'>makanan</button> --}}
    <button wire:click='makanan()'>makanan</button>
    <button wire:click='minuman()'>minuman</button>
</div>
