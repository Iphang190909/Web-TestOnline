@extends('partials.template')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            {{-- breadcrumbs --}}
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>{{ ucwords(str_replace('-',' ',Request::segment(3))) }}</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ ucwords(str_replace('-',' ',Request::segment(3))) }}</a></li>

                    </ol>
                </div>
            </div>
            {{-- end breadcrumbs --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">Form Tambah Soal</h4>
                            <p>Input Data</p>
                        </div>
                        <hr>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Terdapat kesalahan dalam pengisian form. Silahkan cek kembali data form anda!</strong>
                                </div>
                            @endif
                            <div class="basic-form">
                                <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="" class="font-weight-bold">Soal : <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="" class="font-weight-bold">Jawaban : <span class="text-danger">*</span></label>
                                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('soal.index') }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-success mx-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
