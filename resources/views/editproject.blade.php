@extends('admin.app')
@section('title','edit project')
@section('content-title')
@section('content')
<div class="row">
    <div class = "col-lg 12">
        <div class = "card shadow mb-4">
            <div class = "card header py-3">
            </div>

            <div class="card-body">
                @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors -> all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
                <form method ="POST" enctype ="multipart/form-data" action="{{ route('masterproject.update', $data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <h3>Edit projet</h3>
                    <div class = "form-group">
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value = "{{ $data->id_siswa}} ">
                    </div>
                    <div class = "form-group">
                        <label for="nama_project">nama project</label>
                        <input type="text" class="form-control" id="nama_project" name="nama_project" value = "{{ $data->nama_project}} ">
                    </div>
                    <div class = "form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value = "{{ $data->tanggal}}">
                    </div>
                    <div class = "form-group">
                        <label for="deskripsi">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value = "{{ $data->deskripsi}}">
                    </div>
                    <div class = "form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-control-file" id="foto"
                         name="foto">
                         <img src= "{{ asset('./template/img/' .$data->foto) }}" width="300" class = "img-thumbnail">
                    </div>
                    <div class="form-group">
                        <input type ="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection