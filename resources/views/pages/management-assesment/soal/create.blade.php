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
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Pertanyaan</h4>
                        </div>                      
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('token.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8 mx-auto">
                                            <label for="" class="font-weight-bold">Kode Soal : <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" name="kode_soal" class="form-control" placeholder="Kode Soal Otomatis" style="background-color: #EFF5F5" id="" readonly>
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
                                        <div class="form-group-dinamis col-md-8 mx-auto">
                                            <label for="pertanyaan" class="font-weight-bold">Pertanyaan : <span class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <input class="form-control" placeholder="Inputkan Pertanyaan" type="text" name="pertanyaan[]" value=""/>
                                                </div>
                                                <div class="col-md-2">
                                                        <button class="btn btn-success add_pertanyaan" href="javascript:void(0);" id="add_pertanyaan" title="Add field">TAMBAH</button>
                                                </div>           
                                            </div>
                                            <div id="extra-pertanyaan"></div>
                                        </div>
                                        <div class="form-group col-md-8 mt-3 mx-auto">
                                            <label for="" class="font-weight-bold">Nilai : <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="skor" class="form-control" placeholder="Inputkan nilai untuk soal ini" id="">
                                            </div>
                                        </div>
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
    const add = document.querySelectorAll(".form-group-dinamis .add_pertanyaan")
    add.forEach(function(e){
        e.addEventListener('click', function(){
            let element = this.parentElement
            // console.log(element);
            let newElement = document.createElement('div')
            newElement.classList.add('form-group-dinamis', 'col-md-8 mx-auto')
            newElement.innerHTML =
                `<div class="row">
                    <div class="col-md-10">
                            <input class="form-control" placeholder="Inputkan Pertanyaan" type="text" name="pertanyaan[]" value=""/>
                    </div>
                    <div class="col-md-2">
                            <button class="btn btn-success add_pertanyaan" href="javascript:void(0);" id="add_pertanyaan" title="Add field">TAMBAH</button>
                    </div>           
                </div>`
            document.getElementById('extra-pertanyaan').appendChild(newElement)
        })
        
    });
</script>
@endpush
