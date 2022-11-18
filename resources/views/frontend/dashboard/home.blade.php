@extends('frontend.template')
@section('content')
<div class="row mx-auto my-auto">
  <div class="col-lg-6 mt-5">
      <h3 class="mt-5">Selamat anda berhasil login di halaman utama <strong>Tes Online</strong></h3>
      <p class="mb-4">Pilih selanjutnya agar anda bisa mendapatkan token untuk memulai ujian</p>
      <a href="{{route('InputToken')}}" class="btn btn-primary">Lanjutkan</a>
    </div>
    <div class="col-lg-6 ">
        <img  class="img-fluid " src="{{asset('images/tes_mbti2.png')}}" alt="" srcset="" >
    </div>
  </div>
</div>
@endsection