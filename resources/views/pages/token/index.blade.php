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
                        <li class="breadcrumb-item"><a href="{{ route('token.index') }}">Home</a></li>
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
                            <h4 class="card-title">Tambah Token</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('token.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Token : <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="token" class="form-control" placeholder="Silahkan generate token" id="generate">
                                                <div class="input-group-append">
                                                    <a class="btn btn-primary text-white" id="keygen">Generate Token</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Tanggal Expired : <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tgl_expired" id="datepicker" value="{{ date('Y-m-d', strtotime(now()->toDateString())) }}">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                                {{-- <a href="" class="btn btn-primary">Kembali</a> --}}
                                <button type="submit" class="btn btn-success mx-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Table Token</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Token</th>
                                            <th>Expired</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords($item->name) }}</td>
                                                <td>{{ ucwords($item->expired) }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        {{-- <a href="{{ route('token.show',$item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Show Data"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('token.edit',$item->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit" ></i></a> --}}
                                                        <form action="{{ route('token.destroy',$item->id) }}" class="p-0 m-0" method="POST" onsubmit="return confirm('Move data to trash? ')">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Data tidak ada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

