@extends('frontend.template')
@section('content')
<div class="container mx-auto my-auto">
    <div class="d-flex mt-2 justify-content-right">
        <p class="text-dark">Time : <span id="time"><span></p>
    </div> 
        <div class="d-flex my-4 justify-content-left">
          <span class="ml-auto"><a href="{{ url('/') }}" class="forgot-pass text-primary">Daftar soal</a></span>
         </div>
    <div class="row d-flex">
        <div class="col-lg-12 ">
                <div class="contents order-2 order-md-2">
                <div class="card" >
                    <h4 class="card-header mt-0 p-4">Soal 1</h4>
                    <div class="card-body">
                        <h5 class="card-title">Apakah yang dimaksud dengan istilah framework ?</h5>
                        <div class="form-group mt-6">
                            <textarea class="form-control" id="jawaban" rows="12" placeholder="tuliskan jawaban anda disini"></textarea>
                        </div>
                     </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <a href="{{ route('test.index') }}" class="btn btn-primary text-center btn-lg">Soal Sebelumnya</a>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <a href="{{ route('test.index') }}" class="btn btn-primary text-center btn-lg">Soal Selanjutnya</a>
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