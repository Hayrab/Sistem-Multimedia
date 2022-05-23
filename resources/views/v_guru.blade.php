@extends('layout.v_template')
@section('title','Guru')

@section('content')
    <a href="/guru/add" type="button" class="btn btn-primary">Add</a> <br>
    @if (session('pesan'))
    <div id="toast-container" class="toast-top-right">
        <div class="toast toast-success" aria-live="polite" style="">
            <div class="toast-message">Data Berhasil Ditambahkan
            </div>
        </div>
    </div>
    {{session('pesan')}}
    @endif
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Foto Guru</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
          @foreach ($guru as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item-> nip}}</td>
                <td>{{ $item-> nama_guru}}</td>
                <td>{{ $item-> mapel}}</td>
                <td><img src="{{url('foto_guru/'.$item->foto_guru) }}" width="100px"></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$item -> id_guru}}">
                        Delete
                    </button>
                    <a href="/guru/edit/{{$item -> id_guru}}" type="button" class="btn btn-warning">Edit</a>
                    <a href="/guru/detail/{{$item -> id_guru}}" type="button" class="btn btn-info">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @foreach ($guru as $item)
    <div class="modal fade" id="delete{{$item -> id_guru}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $item-> nama_guru}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus data ini ???</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
              <a href="/guru/delete/{{$item -> id_guru}}" class="btn btn-outline-light">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endforeach

@endsection