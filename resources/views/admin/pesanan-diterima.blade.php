<div>
    @foreach ($data as $item)
        <br>{{ $item->user_id }}
        <br>{{ $item->tanggal_pesan }}
        <br>Rp{{ number_format($item->total_harga, 0, ',', '.') }}
        <br>{{ $item->jumlah_diskon }}
        <br>{{ $item->bayar }}
        <br>{{ $item->kembalian }}

    <button wire:click='selesai({{ $item->id }})'>selesai</button>
    @endforeach
</div>
