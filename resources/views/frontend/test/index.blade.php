@extends('frontend.template')
@section('content')
<div class="container mx-auto my-auto">
    <div class="row d-flex">
        <div class="col-lg-4">
            <p class="text-dark">Time : <span id="time"><span></p>

                <div class="card" >
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
        </div>
        <div class="col-lg-4">
            <p class="text-dark">Time : <span id="time"><span></p>

                <div class="card" >
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
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
window.onload = function() { jam(); }
function jam() {
    var e = document.getElementById('time'),
    d = new Date(), h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h +':'+ m +':'+ s;

    setTimeout('jam()', 1000);
}

function set(e) {
    e = e < 10 ? '0'+ e : e;
    return e;
}
</script>
@endpush