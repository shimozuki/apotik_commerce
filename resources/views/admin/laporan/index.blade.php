@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pesanan</th>
                            <th>Penjualan</th>
                            <th>Pembelian</th>
                            <th>Pendapatan</th>
                        </thead>
                        <tbody>
                            @foreach ($collections as $collection)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $collection['tanggal'] }}</td>
                                    <td>{{ $collection['pesanan'] }}</td>
                                    <td>{{ $collection['penjualan'] }}</td>
                                    <td>{{ $collection['pembelian'] }}</td>
                                    <td>{{ $collection['pendapatan'] }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga:</strong></td>
                                    <td>{{ $total_pendapatan }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
