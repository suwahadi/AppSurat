<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        
        <div class="panel-heading">
            Navigasi Menu
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/surat') }}"><i class="fa fa-envelope" aria-hidden="true"></i> Manajemen Surat</a>
                </li>

                <ul style="list-style: none;">
                    <li role="presentation">
                        <a href="{{ url('/surat-masuk') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Surat Masuk</a>
                    </li>
                    <li role="presentation">
                        <a href="{{ url('/surat-keluar') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Surat Keluar</a>
                    </li>
                    <li role="presentation">
                        <a href="{{ url('/jenis-surat') }}"><i class="fa fa-folder" aria-hidden="true"></i> Jenis Surat</a>
                    </li>
                </ul>

                @if (request()->user()->hak=='admin')
                <li role="presentation">
                    <a href="{{ url('/user') }}"><i class="fa fa-users" aria-hidden="true"></i> Akses Pengguna</a>
                </li>
                @endif
                <li role="presentation">
                    <a href="{{ url('/laporan') }}"><i class="fa fa-archive" aria-hidden="true"></i> Laporan Surat</a>
                </li>
            </ul>
        </div>
    </div>
</div>