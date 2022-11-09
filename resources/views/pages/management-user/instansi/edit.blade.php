@extends('partials.template')
@push('js')
    <script>
    $( '#keygen' ).on('click',function()
    {
        $( '#generate' ).val( generateToken(6) );
    });
    function generateToken(n) {
        var chars = '0123456789';
        var token = '';
        for(var i = 0; i < n; i++) {
            token += chars[Math.floor(Math.random() * chars.length)];
        }
        return token;

    }

    </script>
@endpush
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>{{ ucwords(str_replace('-',' ',Request::segment(2))) }}</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ ucwords(str_replace('-',' ',Request::segment(3))) }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="">
                @include('components.notifications')
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Instansi</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('instansi.update', $data->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Nama Instansi : <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama_instansi" class="form-control" value="{{ old('nama_instansi', $data->nama_instansi) }}" placeholder="Masukkan Nama Instansi" id="generate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Alamat : <span class="text-danger">*</span></label>
                                            <textarea name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="5">{{ old('alamat', $data->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{$message}}.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('instansi.index') }}" class="btn btn-primary">Batal</a>
                                <button type="submit" class="btn btn-success mx-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

