<div>
    <form wire:submit="update" enctype="multipart/form-data">
        <input type="text" placeholder="nama" wire:model="nama">
        <input type="text" placeholder="deskripsi" wire:model="deskripsi">
        <input type="number" placeholder="harga" wire:model="harga">
        <input type="file" placeholder="image" wire:model="image">
        <input type="text" placeholder="status" wire:model="status">
        <input type="text" placeholder="jenis" wire:model="jenis">
        <button type="submit">oke</button>
    </form>
</div>
