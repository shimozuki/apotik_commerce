@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pembelians.store1') }}">
                @csrf
                @method('POST')

                <div class="row mb-2">
                    <label for="Pilih Distributor"
                        class="col-md-2 col-form-label text-md-end">{{ __('Distributor') }}</label>
                    <div class="col-md-5">
                        <select name="distributor_id" id="distributor_id"
                            class="form-control @error('distributor_id') is-invalid @enderror">
                            @foreach ($distributors as $distributor)
                                <option value="{{ $distributor->id }}">
                                    {{ $distributor->Nama_Distributor }}</option>
                            @endforeach
                        </select>
                        @error('distributor_id')
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
