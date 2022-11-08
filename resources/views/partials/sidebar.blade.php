<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon icon-home"></i><span
                class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-label">Menu</li>
            <li class=""><a class="has-arrow" href="#" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Management User</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li><a href="{{ route('peserta.index') }}">Peserta</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('token.index') }}" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Token</span></a>
            </li>
            <li><a class="has-arrow" href="#" aria-expanded="false"><i
                        class="icon icon-globe-2"></i><span class="nav-text">Management Assesment</span></a>
                <ul aria-expanded="false">
                    <li><a href="./chart-flot.html">Soal</a></li>
                    <li><a href="./chart-morris.html">Hasil Tes</a></li>
                </ul>
            </li>
            <li>
                <a href="widget-basic.html" aria-expanded="false"><i class="icon icon-layout-25"></i><span
                class="nav-text">Report</span></a>
            </li>
        </ul>
    </div>
</div>
