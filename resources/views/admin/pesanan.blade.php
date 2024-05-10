<div>
    @foreach ($pesanans as $pesanan)
    <br>{{ $pesanan->user_id }}
    <br>{{ $pesanan->tanggal_pesan }}
    <br>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}
    <br>{{ $pesanan->jumlah_diskon }}
    <br>{{ $pesanan->bayar }}
    <br>{{ $pesanan->kembalian }}
    @if ($pesanan->status === "di pending")
    <button class="btn" wire:click='terima({{ $pesanan->id }})'>terima</button>
    <button class="btn" wire:click='tolak({{ $pesanan->id }})'>tolak</button>
    @else
    <br>{{ $pesanan->status }}
    @endif

    @endforeach
</div>
