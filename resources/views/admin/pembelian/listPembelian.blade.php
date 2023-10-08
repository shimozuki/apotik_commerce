@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <a href="{{ url('/admin/tambah-pembelian2') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>
                    Tambah Obat</a>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> List Pembelian</h3>
                        <hr>
                        @if (!empty($pembelian))
                            <div class="alert alert-secondary" role="alert">
                                Tanggal Pesan : <strong>{{ $pembelian->tanggal }}</strong>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Kode</th> --}}
                                            <th>Gambar</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($pembelian_details as $pembelian_detail)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img src="{{ url('uploads') }}/{{ $pembelian_detail->obat->Gambar }}"
                                                        width="100" alt="obat">
                                                </td>
                                                <td>{{ $pembelian_detail->obat->Nama_Obat }}</td>
                                                <td align="left">Rp. {{ number_format($pembelian_detail->obat->Hargas) }}
                                                </td>
                                                <td>{{ $pembelian_detail->jumlah }} Obat</td>
                                                <td align="left">Rp. {{ number_format($pembelian_detail->subtotal) }}
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('pembelians.destroy', ['pembelian_detail' => $pembelian_detail->id]) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="5" align="right"><strong>Total Harga:</strong></td>
                                            @php
                                                $total = 0;
                                                foreach ($pembelian_details as $pembelian_detail) {
                                                    $total += $pembelian_detail->subtotal;
                                                }
                                            @endphp
                                            <td><strong>Rp. {{ number_format($total) }}</strong></td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('pembelians.confirm', ['pembelian' => $pembelian->id]) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="id_pembelian" value="{{ $pembelian->id }}">

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart">  Beli</i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
