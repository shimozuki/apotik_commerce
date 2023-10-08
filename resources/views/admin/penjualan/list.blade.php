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
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($penjualans as $penjualan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penjualan->tanggal }}</td>
                                    <td>{{ $penjualan->total_item }}</td>
                                    <td>Rp. {{ number_format($penjualan->total_harga) }}</td>
                                    <td>Rp. {{ number_format($penjualan->total_bayar) }}</td>
                                    <td>{{ $penjualan->kasir }}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group btn-action">
                                                <a href="{{ route('penjualans.detail', ['penjualan' => $penjualan->id]) }}"
                                                    class="btn btn-warning d-inline-block">
                                                    <i class="fa fa-info fa-fw"></i>
                                                </a>

                                                {{-- <div class="btn-group btn-action">
                                                    <a href="{{ url('admin/penjualan') }}/{{ $penjualan->id }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-edit fa-fw"></i>
                                                    </a>
                                                </div> --}}

                                                <form action="{{ url('admin/penjualan', $penjualan->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-hapus"
                                                        title="Hapus penjualan"
                                                        data-name="{{ $penjualan->Nama_Listpenjualan }}"
                                                        data-table="Listpenjualan"
                                                        onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                        <i class="fa fa-trash fa-fw"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="row">
                        <div class="mx-auto mt-3">
                            {{ $penjualans->fragment('judul')->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
