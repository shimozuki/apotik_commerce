@extends('layouts.admin')
@section('content')
    <div class="col-md-12 mt-2">
        <a href="{{ url('/admin/pembelians') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>
            Kembali</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Harga Beli</th>
                            <th>Jumlah</th>
                            <th>Total Bayar</th>
                        </thead>
                        <tbody>
                            @foreach ($pembelianDetails as $pembelianDetail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pembelianDetail->obat->Nama_Obat }}</td>
                                    <td>Rp. {{ number_format($pembelianDetail->harga_beli) }}</td>
                                    <td>{{ $pembelianDetail->jumlah }}</td>
                                    <td>Rp. {{ number_format($pembelianDetail->subtotal) }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
