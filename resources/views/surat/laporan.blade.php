@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Laporan Surat</strong> Masuk / Keluar</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'laporan','method' => 'get','class' => 'form-inline']) !!}
                    <div class="form-group">
                        <label for="" class="control-label">Dari:</label>
                        {!! Form::date('from', $from, ['class'=>'form-control input-sm']) !!}
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Sampai:</label>
                        {!! Form::date('to', $to, ['class'=>'form-control input-sm']) !!}
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jenis</label>
                        {!! Form::select('tipe', ['masuk' => 'Surat Masuk', 'keluar' => 'Surat Keluar'], $tipe, ['class' => 'form-control input-sm']) !!}
                    </div>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Tampilkan</button>
                    <button type="button" class="btn btn-default btn-sm cetak"><i class="fa fa-print"></i> Cetak</button>

                    {!! Form::close() !!}
                    <br>
                    <div id="cetak">
                        <h1 class="text-center head hide" style="text-transform: uppercase;">LAPORAN SURAT {{ $tipe }}</h1>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor</th>
                                    <th>Judul Surat</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Instansi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surats as $si => $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->no_surat }}</td>
                                    <td>{{ $s->judul_surat }}</td>
                                    <td>{{ $s->jenis_surat->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ $s->instansi }}</td>
                                    <td>{{ $s->keterangan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.cetak').click(function () {
        $('.head').removeClass('hide');
        $('#cetak').print();
        $('.head').addClass('hide');
    })
</script>
@endsection