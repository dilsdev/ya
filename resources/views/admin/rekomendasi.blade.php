<div>
    <div class="container-xl">
    <form class="row" wire:submit="store" enctype="multipart/form-data">
        <div class="col-5">
            <label for="nama_promosi" class="form-label">Nama</label>
            <input
                type="text"
                class="form-control"
                name="nama_promosi"
                id="nama_promosi"
                aria-describedby="helpId"
                placeholder="Nama / Judul promosi"
                wire:model="nama_promosi"
            />
            <small id="helpId" class="form-text text-muted">Masukkan mana promosi</small>
        </div>
        <div class="col-5">
            <label for="image" class="form-label">Choose file</label>
            <input
                type="file"
                class="form-control"
                name="image"
                id="image"
                placeholder="Pilih foto"
                aria-describedby="fileHelpId"
                wire:model="image"
            />
            <div id="fileHelpId" class="form-text">Masukkan foto promosi</div>
        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <button  class="btn btn-primary mt-1" type="submit">Submit</button>
        </div>
    </form>
                    <h4 class="mt-5">
                        Rekomendasi
                    </h4>
                    @foreach ($data as $key => $item)
                    <div class="card" style="height: 200px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="mt-2">{{ $item->nama_promosi }}</h4>
                                </div>
                                <div class="col-6">
                                    <a href="#" >
                                        <div class="img-responsive img-responsive-3x1 rounded border" style="background-image: url({{ asset('/storage/rekomendasi/'.$item->image) }})"></div>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <h4 class="mt-2">{{ $item->url }}</h4>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-danger" wire:navigate wire:click="destroy({{ $item->id }})">DELETE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

    </div>
</div>
