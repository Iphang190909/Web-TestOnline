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
                            <h4 class="card-title">Form View Data</h4>
                            <p>View Data Instansi</p>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Nama Instansi</td>
                                            <td width="1%">:</td>
                                            <td >{{ ucwords($data->nama_instansi) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Alamat</td>
                                            <td width="1%">:</td>
                                            <td >{{ ucwords($data->alamat) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-start">
                            <a href="{{ route('instansi.index') }}" class="btn btn-primary">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
