@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/tambah-distributor') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-2">
                    <label for="Kode_Distributor" class="col-md-2 col-form-label text-md-end">{{ __('Kode Distributor') }}</label>

                    <div class="col-md-5">
                        <input id="Kode_Distributor" type="text"
                            class="form-control @error('Kode_Distributor') is-invalid @enderror" name="Kode_Distributor" required
                            autocomplete="Kode_Distributor" autofocus>

                        @error('Kode_Distributor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="Nama_Distributor" class="col-md-2 col-form-label text-md-end">{{ __('Nama Distributor') }}</label>

                    <div class="col-md-5">
                        <input id="Nama_Distributor" type="text"
                            class="form-control @error('Nama_Distributor') is-invalid @enderror" name="Nama_Distributor" required
                            autocomplete="Nama_Distributor" autofocus>

                        @error('Nama_Distributor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah distributor
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
