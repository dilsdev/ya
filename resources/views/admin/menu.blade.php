<div>
    <form wire:submit="store" enctype="multipart/form-data">
        <input type="text" placeholder="nama" wire:model="nama">
        <input type="text" placeholder="deskripsi" wire:model="deskripsi">
        <input type="number" placeholder="harga" wire:model="harga">
        <input type="file" placeholder="image" wire:model="image">
        <input type="text" placeholder="status" wire:model="status">
        <input type="text" placeholder="jenis" wire:model="jenis">
        <button type="submit">oke</button>
    </form>
<br>
---------------------------------
    @foreach ($menus as $menu)
        <br>No:{{ $menu->id }}
        <br>Menu:{{ $menu->nama }}
        <br>Deskripsi:{{ $menu->deskripsi }}
        <br>Harga: Rp.{{ $menu->harga }}
        <br><img style="width: 200px" src="{{ asset('/storage/menu/'.$menu->image) }}" alt="">
        <br>Status:{{ $menu->status }}
        <button wire:navigate wire:click="destroy({{ $menu->id }})">DELETE</button>
        <br>
        <a wire:navigate href="/admin/menu/edit/{{ $menu->id }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
        <---------------------------------------------------------------------->
        @endforeach
</div>
