<div>
    {{-- Do your work, then step back. --}}
    {{-- <div wire:poll='pending' wire:init="pending()">
    <!-- ... -->
    {{ $pendings }}
    </div>
    <div wire:poll='proses' wire:init="proses()">
    <!-- ... -->
    {{ $proseses }}
    </div>
    <div wire:poll='selesai' wire:init="selesai()">
    <!-- ... -->
    {{ $selesais }}
    </div> --}}
    <div class="container">
        <h4>Di pending</h4>
            <div class="card">
              <div class="table-responsive">
                <table class="table table-vcenter card-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Total harga</th>
                      <th>Bayar</th>
                      <th>Kembalian</th>
                      <th>Aksi</th>
                      <th class="w-1"></th>
                    </tr>
                    </thead>
                  <tbody wire:init="pending()">
                        @foreach ($pendings as $key => $pending)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-secondary">
                        {{ $pending->name}}
                      </td>
                      <td class="text-secondary">{{ $pending->tanggal_pesan }}</td>
                      <td class="text-secondary">{{ $pending->status }}</td>
                      <td class="text-secondary">
                        Rp.{{ number_format($pending->total_harga, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($pending->bayar, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($pending->kembalian, 0, ',', '.') }}
                      </td>
                      <td>
                       <a href=" {{ route('web.detail', $pending->id) }}">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <h4>Di proses</h4>
            <div class="card">
              <div class="table-responsive">
                <table class="table table-vcenter card-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Total harga</th>
                      <th>Bayar</th>
                      <th>Kembalian</th>
                      <th>Aksi</th>
                      <th class="w-1"></th>
                    </tr>
                    </thead>
                  <tbody wire:init="proses()">
                        @foreach ($proseses as $key => $proses)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-secondary">
                        {{ $proses->name}}
                      </td>
                      <td class="text-secondary">{{ $proses->tanggal_pesan }}</td>
                      <td class="text-secondary">{{ $proses->status }}</td>
                      <td class="text-secondary">
                        Rp.{{ number_format($proses->total_harga, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($proses->bayar, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($proses->kembalian, 0, ',', '.') }}
                      </td>
                      <td>
                       <a href=" {{ route('web.detail', $proses->id) }}">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <h4>Selesai</h4>
            <div class="card">
              <div class="table-responsive">
                <table class="table table-vcenter card-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Total harga</th>
                      <th>Bayar</th>
                      <th>Kembalian</th>
                      <th>Aksi</th>
                      <th class="w-1"></th>
                    </tr>
                    </thead>
                  <tbody wire:init="selesai()">
                        @foreach ($selesais as $key => $selesai)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-secondary">
                        {{ $selesai->name}}
                      </td>
                      <td class="text-secondary">{{ $selesai->tanggal_pesan }}</td>
                      <td class="text-secondary">{{ $selesai->status }}</td>
                      <td class="text-secondary">
                        Rp.{{ number_format($selesai->total_harga, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($selesai->bayar, 0, ',', '.') }}
                      </td>
                      <td>
                        Rp.{{ number_format($selesai->kembalian, 0, ',', '.') }}
                      </td>
                      <td>
                       <a href=" {{ route('web.detail', $selesai->id) }}">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
