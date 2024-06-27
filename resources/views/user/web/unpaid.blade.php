<div>
    <div class="container">
         <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total harga</th>
                            <th>Status</th>
                            <th class="w-1">Detail</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($unpaids as $key => $unpaid)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $unpaid->name }}</td>
                                <td>
                                    Rp{{ number_format($unpaid->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                   {{ $unpaid->status }}
                                </td>
                                <td>
                                    <a class="btn btn-warning" href=' {{ "../checkout/$unpaid->id/$unpaid->token" }}'>Bayar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
