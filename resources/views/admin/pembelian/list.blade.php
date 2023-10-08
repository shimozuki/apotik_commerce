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
                            <th>Distributor</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($pembelians as $pembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pembelian->tanggal }}</td>
                                    <td>{{ $pembelian->distributor->Nama_Distributor }}</td>
                                    <td>{{ $pembelian->total_item }}</td>
                                    <td>Rp. {{ number_format($pembelian->total_harga) }}</td>
                                    <td>Rp. {{ number_format($pembelian->bayar) }}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group btn-action">
                                                <a href="{{ route('pembelians.detail', ['pembelian' => $pembelian->id]) }}"
                                                    class="btn btn-warning d-inline-block">
                                                    <i class="fa fa-info fa-fw"></i>
                                                </a>

                                                {{-- <div class="btn-group btn-action">
                                                    <a href="{{ url('admin/pembelian') }}/{{ $pembelian->id }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-edit fa-fw"></i>
                                                    </a>
                                                </div> --}}

                                                <form action="{{ url('admin/pembelian', $pembelian->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-hapus"
                                                        title="Hapus pembelian"
                                                        data-name="{{ $pembelian->Nama_ListPembelian }}"
                                                        data-table="ListPembelian"
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
                            {{ $pembelians->fragment('judul')->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
