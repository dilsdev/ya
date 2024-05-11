<div>
    <div>
        <h3>pesanan belum bayar</h3>
    @foreach ($data as $item)
        <br>{{ $item->user_id }}
        <br>{{ $item->tanggal_pesan }}
        <br>Rp{{ number_format($item->total_harga, 0, ',', '.') }}
        <br>{{ $item->jumlah_diskon }}
        <br>{{ $item->bayar }}
        <br>{{ $item->kembalian }}

    <form action="{{ route('admin.pembayaran') }}" method="POST">
    @csrf
        <input type="hidden" value="{{ $item->id }}" name="id">
        <button type="submit" class="btn btn-primary">bayar</button>
    </form>

    @endforeach
    <h3>pesanan sudah bayar</h3>
    @foreach ($selesai as $item)
        <br>{{ $item->user_id }}
        <br>{{ $item->tanggal_pesan }}
        <br>Rp{{ number_format($item->total_harga, 0, ',', '.') }}
        <br>{{ $item->jumlah_diskon }}
        <br>{{ $item->bayar }}
        <br>{{ $item->kembalian }}
    @endforeach
</div>

</div>
