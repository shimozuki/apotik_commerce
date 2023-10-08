@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>No</th>
                            <th>Kode Jasa</th>
                            <th>Nama Perusahaan</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($jasas as $jasa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jasa->Kode_Jasa }}</td>
                                    <td>{{ $jasa->Nama_Perusahaan }}</td>
                                    <td>{{ $jasa->Kota_Asal }}</td>
                                    <td>{{ $jasa->Kota_Tujuan }}</td>
                                    <td>Rp. {{ number_format($jasa->Harga) }}</td>
                                    <td>
                                        <div class="btn-group btn-action">
                                            <a href="{{ url('admin/jasa') }}/{{ $jasa->id }}"
                                                class="btn btn-primary d-inline-block" title="Edit Jurusan">
                                                <i class="fa fa-edit fa-fw"></i>
                                            </a>
                                        </div>

                                        <form action="{{ url('admin/jasa', $jasa->id) }}" method="POST" class="d-inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus jasa" data-name="{{ $jasa->Nama_jasa }}"
                                                data-table="jasa" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <i class="fa fa-trash fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="row">
                        <div class="mx-auto mt-3">
                            {{ $jasas->fragment('judul')->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
