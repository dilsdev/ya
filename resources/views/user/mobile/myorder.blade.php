<div>
    {{-- Do your work, then step back. --}}

    {{-- <div wire:poll='proses' wire:init="proses()">
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
                            <th>Name</th>
                            <th>Total harga</th>
                            <th>Status</th>
                            <th class="w-1">Detail</th>
                        </tr>
                    </thead>
                    <tbody wire:init="pending()">
                        @foreach ($pendings as $pending)
                            <tr>
                                <td>{{ $pending->name }}</td>
                                <td>
                                    Rp{{ number_format($pending->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <button class="btn btn-warning">{{ $pending->status }}</button>
                                </td>
                                <td>
                                    <a href=" {{ route('user.detail', $pending->id) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <h4>Di proses</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total harga</th>
                            <th>Status</th>
                            <th class="w-1">Detail</th>
                        </tr>
                    </thead>
                    <tbody wire:init="proses()">
                        @foreach ($proseses as $proses)
                            <tr>
                                <td>{{ $proses->name }}</td>
                                <td>
                                    Rp{{ number_format($proses->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <button class="btn btn-warning">{{ $proses->status }}</button>
                                </td>
                                <td>
                                    <a href=" {{ route('user.detail', $proses->id) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <h4>Selesai</h4>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total harga</th>
                            <th>Status</th>
                            <th class="w-1">Detail</th>
                        </tr>
                    </thead>
                    <tbody wire:init="selesai()">
                        @foreach ($selesais as $selesai)
                            <tr>
                                <td>{{ $selesai->name }}</td>
                                <td>
                                    Rp{{ number_format($selesai->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <button class="btn btn-warning">{{ $selesai->status }}</button>
                                </td>
                                <td>
                                    <a href=" {{ route('user.detail', $selesai->id) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
