@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/tambah-jasa') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-2">
                    <label for="Kode_Jasa" class="col-md-2 col-form-label text-md-end">{{ __('Kode Jasa') }}</label>

                    <div class="col-md-5">
                        <input id="Kode_Jasa" type="text"
                            class="form-control @error('Kode_Jasa') is-invalid @enderror" name="Kode_Jasa" required
                            autocomplete="Kode_Jasa" autofocus>

                        @error('Kode_Jasa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="row mb-2">
                    <label for="Nama_Perusahaan" class="col-md-2 col-form-label text-md-end">{{ __('Nama Perusahaan') }}</label>

                    <div class="col-md-5">
                        <input id="Nama_Perusahaan" type="text"
                            class="form-control @error('Nama_Perusahaan') is-invalid @enderror" name="Nama_Perusahaan" required
                            autocomplete="Nama_Perusahaan" autofocus>

                        @error('Nama_Perusahaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="Kota_Asal" class="col-md-2 col-form-label text-md-end">{{ __('Kota Asal') }}</label>

                    <div class="col-md-5">
                        <input id="Kota_Asal" type="text"
                            class="form-control @error('Kota_Asal') is-invalid @enderror" name="Kota_Asal" required
                            autocomplete="Kota_Asal" autofocus>

                        @error('Kota_Asal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="Kota_Tujuan" class="col-md-2 col-form-label text-md-end">{{ __('Kota Tujuan') }}</label>

                    <div class="col-md-5">
                        <input id="Kota_Tujuan" type="text"
                            class="form-control @error('Kota_Tujuan') is-invalid @enderror" name="Kota_Tujuan" required
                            autocomplete="Kota_Tujuan" autofocus>

                        @error('Kota_Tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="Harga" class="col-md-2 col-form-label text-md-end">Harga (Rp.)</label>

                    <div class="col-md-5">
                        <input id="Harga" type="text" class="form-control @error('Harga') is-invalid @enderror"
                            name="Harga" required autocomplete="Harga" autofocus>

                        @error('Harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-2 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah Barang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
