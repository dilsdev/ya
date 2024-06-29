<div>
    {{-- {{ dd($keranjangs) }} --}}

    {{-- <button  wire:click='hapuskeranjang({{ $keranjang->id }})' class="btn btn-dangger">hapus</button> --}}


    <div class="container-xl">
        @if ($message != 'di_terima')
            <div class="alert alert-success" role="alert">Akun anda belum verifikasi, kami tidak bisa menerima pesanan
                cod. untuk menghindari order palsu, terimakasih...</div>
        @endif
        <h4>
            Keranjang
        </h4>
        @foreach ($keranjangs as $keranjang)
            @if ($keranjang->status == 'ready')
                <div class="card" style="height: 200px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                @if ($keranjang->checkbox == 'true')
                                    <input wire:click='uncheck({{ $keranjang->id }})' class="form-check-input" checked
                                        type="checkbox">
                                @else
                                    <input wire:click='check({{ $keranjang->id }})' class="form-check-input"
                                        type="checkbox">
                                @endif
                            </div>
                            <div class="col-2">
                                <a href="#">
                                    <div class="img-responsive img-responsive-1x1 rounded border"
                                        style="background-image: url({{ asset('/storage/menu/' . $keranjang->image) }})">
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <h2 class="mb-1">{{ $keranjang->nama }}</h2>
                                <span>{{ $keranjang->deskripsi }}</span>
                            </div>
                            <div class="col-1">
                                <h4 class="mt-2">{{ number_format($keranjang->harga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    {{-- <h4>{{ $keranjang->nama}}</h4> --}}
                                    <div class="gap-1 col d-flex">
                                        <button class="card d-flex"
                                            style="justify-content:center ; align-items: center;">
                                            <svg wire:click='kurangikeranjang({{ $keranjang->id }})'
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        </button>
                                        <div class="card d-flex" style="justify-content:center ; align-items: center;">
                                            <h4 class="p-2 m-auto">{{ $keranjang->jumlah }}</h4>
                                        </div>
                                        <button wire:click='tambahkeranjang({{ $keranjang->id }})' class="card d-flex"
                                            style="justify-content:center ; align-items: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <h4 class="mt-2">{{ number_format($keranjang->harga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-1">

                                <svg wire:click='hapuskeranjang({{ $keranjang->id }})'
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach ($keranjangs as $keranjang)
            @if ($keranjang->status == 'notready')
                <div class="card card-inactive" style="height: 200px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                @if ($keranjang->checkbox == 'true')
                                    <input wire:click='uncheck({{ $keranjang->id }})' class="form-check-input" checked
                                        type="checkbox">
                                @else
                                    <input wire:click='check({{ $keranjang->id }})' class="form-check-input"
                                        type="checkbox">
                                @endif
                            </div>
                            <div class="col-2">
                                <a href="#">
                                    <div class="img-responsive img-responsive-1x1 rounded border"
                                        style="background-image: url({{ asset('/storage/menu/' . $keranjang->image) }})">
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <h2 class="mb-1">{{ $keranjang->nama }}</h2>
                                <span style="color: red; font-style: italic">*Menu belum ready</span>
                                <br>
                                <span>{{ $keranjang->deskripsi }}</span>
                            </div>
                            <div class="col-1">
                                <h4 class="mt-2">{{ number_format($keranjang->harga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    {{-- <h4>{{ $keranjang->nama}}</h4> --}}
                                    <div class="gap-1 col d-flex">
                                        <button class="card d-flex"
                                            style="justify-content:center ; align-items: center;">
                                            <svg wire:click='kurangikeranjang({{ $keranjang->id }})'
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-minus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        </button>
                                        <div class="card d-flex"
                                            style="justify-content:center ; align-items: center;">
                                            <h4 class="p-2 m-auto">{{ $keranjang->jumlah }}</h4>
                                        </div>
                                        <button wire:click='tambahkeranjang({{ $keranjang->id }})'
                                            class="card d-flex" style="justify-content:center ; align-items: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="col-2">
                                <h4 class="mt-2">{{ number_format($keranjang->harga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="col-1">

                                <svg wire:click='hapuskeranjang({{ $keranjang->id }})'
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="container card" style="position:sticky;">
            <div class="row d-flex">
                {{-- <div class="m-2 col-2 d-flex justify-content-center align-items-center">
                    <input class="form-check-input" style="width: 25px; height: 25px;" type="checkbox">
                </div> --}}
                <div class="m-2 col ">
                    <div class="d-flex align-items-center" style="height: 100%;">
                        <h3 style="margin: 0; padding: 0;">Total:
                            <strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
                        </h3>
                    </div>
                </div>
                <div class="m-2 col">
                    <div class="mb-3">
                        <select class="form-select form-select-xl" name="ok" id="ok"
                            wire:model.live="metode_pembayaran">
                            <option selected>Pilih metode pembayaran</option>
                            <option value="cod" @if ($message != 'di_terima') disabled @endif>Bayar langsung
                            </option>
                            <option value="online">Bayar online</option>
                        </select>
                    </div>
                </div>
                <div class="m-2 col">
                    <input type="text" wire:model.live='pesan' class="form-control"
                        placeholder="Pesan untuk admin (Opsional)">
                </div>
                <div class="w-full">
                    <div class="card">
                        @if (isset($this->dataArray[0]))
                            @if ($metode_pembayaran == 'cod')
                                {{-- <button wire:confirm="Anda yakin ingin membeli makanan / minuman ini?" wire:click='pesan' wire:loading.attr="disabled"
                            class="btn btn-primary">Bayar langsung</button> --}}
                                <form style="width: 100%" action="{{ route('pesan') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="pesan" value="{{ $pesan }}">
                                    <button type="submit mr-auto" class="btn btn-primary w-full">Bayar cod</button>
                                </form>
                            @elseif ($metode_pembayaran == 'online')
                                @if ($message != 'di_terima')
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" wire:model.live='siswa'
                                            checked="true">
                                        <span class="form-check-label">Apakah anda siswa SMKN 6 Jember?</span>
                                    </label>
                                    @if ($siswa == 1)
                                        <form style="width: 100%" action="{{ route('pesanmitrans') }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="pesan" value="{{ $pesan }}">
                                            <button type="submit mr-auto" class="btn btn-primary w-full">Bayar online
                                                (sebagai siswa)</button>
                                        </form>
                                    @else
                                        <form style="width: 100%" action="{{ route('detailpelanggan') }}"
                                            method="get">
                                            @csrf
                                            <input type="hidden" name="pesan" value="{{ $pesan }}">
                                            <button type="submit mr-auto" class="btn btn-primary w-full">Bayar
                                                online</button>
                                        </form>
                                    @endif
                                @else
                                    <form style="width: 100%" action="{{ route('pesanmitrans') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="pesan" value="{{ $pesan }}">
                                        <button type="submit mr-auto" class="btn btn-primary w-full">Bayar
                                            online</button>
                                    </form>
                                @endif
                            @else
                                <button class="btn btn-primary disabled" disabled>Cekout</button>
                            @endif
                        @else
                            <button class="btn btn-primary disabled" disabled>Keranjang kosong</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
