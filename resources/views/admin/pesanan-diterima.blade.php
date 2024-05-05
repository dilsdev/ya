<div>
    @foreach ($data as $item)
        <br>{{ $item->user_id }}
        <br>{{ $item->tanggal_pesan }}
        <br>{{ $item->total_harga }}
        <br>{{ $item->jumlah_diskon }}
        <br>{{ $item->bayar }}
        <br>{{ $item->kembalian }}

    <a href="#" class="btn"  data-bs-toggle="modal" data-bs-target="#modal-report">
        Bayar
    </a>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form wire:submit='detail({{ $item->user_id }})' class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bayar seharga {{ $item->total_harga }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Masukkan nominal uang pembeli</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="1xxxx">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
