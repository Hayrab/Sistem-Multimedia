@extends('layout.v_template')
@section('title','Home')

@section('content')
    <form action="/guru/insert" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip')}}">
                        <div class="text-danger">
                            @error('nip')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru')}}">
                        <div class="text-danger">
                            @error('nama_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <input name="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel')}}"> 
                        <div class="text-danger">
                            @error('mapel')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Guru</label>
                        <input type="file" name="foto_guru" class="form-control @error('foto_guru') is-invalid @enderror" value="{{ old('foto_guru')}}">
                        <div class="text-danger">
                            @error('foto_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        
    
    </form>
@endsection