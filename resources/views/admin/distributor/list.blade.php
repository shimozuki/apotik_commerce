@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>No</th>
                            <th>Kode Distributor</th>
                            <th>Nama Distributor</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($distributors as $distributor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $distributor->Kode_Distributor }}</td>
                                    <td>{{ $distributor->Nama_Distributor }}</td>
                                    <td>
                                        <div class="btn-group btn-action">
                                            <a href="{{ url('admin/distributor') }}/{{ $distributor->id }}"
                                                class="btn btn-primary d-inline-block" title="Edit Jurusan">
                                                <i class="fa fa-edit fa-fw"></i>
                                            </a>
                                        </div>

                                        <form action="{{ url('admin/distributor', $distributor->id) }}" method="POST" class="d-inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus distributor" data-name="{{ $distributor->Nama_distributor }}"
                                                data-table="distributor" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <i class="fa fa-trash fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="row">
                        <div class="mx-auto mt-3">
                            {{ $distributors->fragment('judul')->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
