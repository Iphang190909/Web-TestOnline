@extends('frontend.template')
@section('content')
<div class="row mx-auto my-auto">
  <div class="card">
    <h4 class="card-header mt-0 p-4">Masukkan Token</h4>
    <div class="card-body">
      <h5 class="card-title">Token dikirim melalui email yang telah anda daftarkan</h5>
      <div class="form-group mt-5">
        <input class="form-control input-lg" id="inputlg" type="text">
        <small class="text-danger">* jika anda sudah yakin pilih mulai ujian untuk melakukan ujian</small>
      </div>
    </div>
    <div class="text-center p-5">
      <a href="{{ route('test.index') }}" class="btn btn-primary text-center btn-lg">Mulai Ujian</a>
    </div>
  </div>
</div>
@endsection