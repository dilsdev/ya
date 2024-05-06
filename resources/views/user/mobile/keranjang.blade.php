<div>
    {{-- {{ dd($keranjangs) }} --}}
    @foreach ($keranjangs as $keranjang)
        {{ $keranjang->id}}
        {{ $keranjang->name}}
        {{ $keranjang->nama}}
        {{ $keranjang->jumlah}}
        <button  wire:click='hapuskeranjang({{ $keranjang->id }})' class="btn btn-dangger">hapus</button>
    @endforeach
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container-xl">
                    <h4 m-1 mb-3>
                        Keranjang
                    </h4>
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div class="col-5">
                                    <a href="#" class="d-block">
                                        <img src="./static/photos/brainstorming-session-with-creative-designers.jpg"
                                            class="card-img-top"></a>
                                </div>
</div>
