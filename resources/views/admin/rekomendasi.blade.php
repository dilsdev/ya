<div>
    <form wire:submit="store" enctype="multipart/form-data">
                <input type="text" placeholder="nama" wire:model="nama_promosi">
                <input type="file" placeholder="image" wire:model="image">
                <button type="submit">oke</button>
    </form>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @foreach ($data as $item)
        <br>{{ $item->nama_promosi }}
        <br>{{ $item->image }}
        <br>{{ $item->url }}
    @endforeach
</div>
