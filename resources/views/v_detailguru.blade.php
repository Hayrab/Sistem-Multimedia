@extends('layout.v_template')
@section('title','Detail Guru')

@section('content')

<table class="table">
    <tr>
        <th width="100px">NIP</th>
        <th width="30px">:</th>
        <th>{{ $guru-> nip}}</th>
    </tr>
    <tr>
        <th width="100px">Nama Guru</th>
        <th width="30px">:</th>
        <th>{{ $guru-> nama_guru}}</th>
    </tr>
    <tr>
        <th width="100px">Mapel</th>
        <th width="30px">:</th>
        <th>{{ $guru-> mapel}}</th>
    </tr>
    <tr>
        <th width="100px">FotoP</th>
        <th width="30px">:</th>
        <th><img src="{{url('foto_guru/'.$guru->foto_guru) }}" width="100px"></th>
    </tr>
         <th><a href="/guru" type="button" class="btn  btn-success">Kembali</a></th>
    <tr>

    </tr>


@endsection