@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('penjualans.store2') }}">
                @csrf
                @method('POST')
                
                <input type="hidden" name="penjualan_id" value="{{ $penjualan_id }}">

                <div class="row mb-2">
                    <label for="Kode_Obat" class="col-md-2 col-form-label text-md-end">{{ __('Kode Obat') }}</label>

                    <div class="col-md-5">
                        <select name="obat_id" id="obat_id" class="form-control @error('obat_id') is-invalid @enderror">
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}">
                                    {{ $obat->Nama_Obat }}</option>
                            @endforeach
                        </select>
                        @error('obat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <label for="total_item" class="col-md-2 col-form-label text-md-end">total_item</label>

                    <div class="col-md-5">
                        <input id="total_item" type="number" class="form-control @error('total_item') is-invalid @enderror"
                            name="total_item" required autocomplete="total_item" autofocus>

                        @error('total_item')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row mb-0">
                    <div class="col-md-2 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah obat
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
