@extends('partials.template')
@push('css')
    <style>
       .input-group > .form-control:not(:last-child), .input-group > .custom-select:not(:last-child){
            background-color: #c2c0c0 !important;
        }
    </style>
@endpush
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
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Pertanyaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('soal.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Kode Soal : <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="kode_soal" class="form-control bg-gray" placeholder="Silahkan generate kode soal" id="generate" readonly>
                                                <div class="input-group-append">
                                                    <a class="btn btn-primary text-white" id="keygen">Generate Kode Soal</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" name="id_instansi" class="font-weight-bold">Nama Instansi : <span class="text-danger">*</span></label>
                                            <select class="form-control" id="" name="id_instansi">
                                                <option>-- Pilih Instansi --</option>
                                                {{-- @forelse ($instansi as $item)
                                                    <option value="{{ $item->id }}" {{ old('id_instansi') == $item->id ? 'selected' : '' }}> {{ $item->nama_instansi }} </option>
                                                @empty
                                                @endforelse --}}
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="opsi">
                                        <p><strong>Pertanyaan</strong></p>
                                        <table class="table opsi-jawaban">
                                            <thead>
                                                <tr>
                                                    <th>Soal</th>
                                                    <th>Nilai</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="id_opsi">
                                                @if (old('opsi') != '')
                                                    @foreach (old('opsi') as $key => $value)
                                                        <div class="countVar" data-count="{{ count(old('opsi')) }}"></div>
                                                        <tr data-id={{ $key == 0 ? $key + 1 : $key }}>
                                                            <td>
                                                                <div class="form-group col-md-12">
                                                                    {{-- <label>Opsi</label> --}}
                                                                    <input type="text" id="opsi_name" name="opsi[{{ $key }}][opsi_name]"
                                                                        class="form-control @error('opsi.' . $key . '.opsi_name') is-invalid @enderror"
                                                                        placeholder="Pertanyaan" value="{{ old('opsi.' . $key . '.opsi_name') }}">
                                                                    @error('opsi.' . $key . '.opsi_name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group col-md-12">
                                                                    {{-- <label>Skor</label> --}}
                                                                    <input type="number" id="skor" name="opsi[{{ $key }}][skor]"
                                                                        class="form-control @error('opsi.' . $key . '.skor') is-invalid @enderror"
                                                                        placeholder="Skor" value="{{ old('opsi.$key.skor') }}" value="0">
                                                                    @error('opsi.' . $key . '.skor')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if ($key == 0)
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success plus"> <i
                                                                                class="fa fa-plus"></i> </button>
                                                                        {{-- <a class="addDetail" class="btn p-3" href=""><i class="fa fa-plus-square text-primary p-3" style="font-size: 24px"></i></a> --}}
                                                                    </div>
                                                                @else
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success plus"> <i
                                                                                class="fa fa-plus"></i> </button>
                                                                        <button type="button" class="btn btn-danger minus"> <i
                                                                                class="fa fa-minus"></i> </button>
                                                                        {{-- <a class="addDetail" class="btn p-3" href=""><i class="fa fa-plus-square text-primary p-3" style="font-size: 24px"></i></a> --}}
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <div id="countVar" data-count="0"></div>
                                                    <tr data-id="1">
                                                        <td>
                                                            <div class="">
                                                                {{-- <label>Opsi</label> --}}
                                                                <input type="text" id="opsi_name" name="opsi[1][opsi_name]" class="form-control "
                                                                    placeholder="Pertanyaan">
                                                                @error('opsi.1.opsi_name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                {{-- <label>Skor</label> --}}
                                                                <input type="number" id="skor" name="opsi[1][skor]" class="form-control skor_option"
                                                                    placeholder="Skor">
                                                                @error('opsi.1.skor')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i>
                                                                </button>
                                                                {{-- <a class="addDetail" class="btn p-3" href=""><i class="fa fa-plus-square text-primary p-3" style="font-size: 24px"></i></a> --}}
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ route('soal.index') }}" class="btn btn-primary">Kembali</a>
                                        <button type="submit" class="btn btn-success mx-2">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('form-dinamis')
<script>
    $( '#generate' ).val( generateToken(4) );
    $( '#keygen' ).on('click',function()
    {
        $( '#generate' ).val( generateToken(4) );
    });
    function generateToken(n) {
        var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var token = '';
        for(var i = 0; i < n; i++) {
            token += chars[Math.floor(Math.random() * chars.length)];
        }
        return token;

    }
    addOption();
    function addOption() {
            $('body').on('click', '.plus', function() {
                var i = $("#opsi tr:last").data('id');
                i = i + 1;
                $('#id_opsi').append('<tr data-id="' + i + '">\
                        <td>\
                                <input type="text" id="id_opsi" name="opsi[' + i + '][opsi_name]" class="form-control" placeholder="Pertanyaan">\
                        </td>\
                        <td>\
                            <input type="number" id="skor" name="opsi[' + i + '][skor]" class="form-control skor_option" placeholder="Skor" >\
                            </td>\
                        <td class="">\
                            <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i> </button>\
                            <button type="button" class="btn btn-danger minus"> <i class="fa fa-minus"></i> </button>\
                        </td>\
                    </tr>');
            });
            $('body').on('click', '.minus', function() {
                $(this).closest('tr').remove();
                // i--;
            });
        }
</script>
@endpush
