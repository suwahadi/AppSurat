@if(isset($submitButtonText))
    {!! Form::hidden('tipe', null) !!}
    <div class="form-group {{ $errors->has('tipe') ? 'has-error' : ''}}">
        {!! Form::label('tipe', 'Tipe', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('tipe', "Surat $surat->tipe" , ['disabled'=>'disabled','class'=>'form-control']) !!}
        </div>
    </div>
@else
    <div class="form-group {{ $errors->has('tipe') ? 'has-error' : ''}}">
        {!! Form::label('tipe', 'Tipe', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('tipe', ['masuk'=>'Surat masuk', 'keluar'=>'Surat keluar'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control tipe']) !!}
            {!! $errors->first('tipe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
<div class="form-group {{ $errors->has('no_surat') ? 'has-error' : ''}}">
    {!! Form::label('no_surat', 'No Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('no_surat', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('no_surat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('judul_surat') ? 'has-error' : ''}}">
    {!! Form::label('judul_surat', 'Judul Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('judul_surat', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('judul_surat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('jenis_surat_id') ? 'has-error' : ''}}">
    {!! Form::label('jenis_surat_id', 'Jenis Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jenis_surat_id', $jenisSurats, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

        {!! $errors->first('jenis_surat_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    {!! Form::label('tanggal', 'Tanggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('instansi') ? 'has-error' : ''}}">
    {!! Form::label('nstansi', 'Instansi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('instansi', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('instansi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('keterangan', null, ('' == '') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'SIMPAN', ['class' => 'btn btn-primary']) !!}
    </div>
</div>