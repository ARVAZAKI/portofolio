@extends('admin.app')
@section('title','edit siswa')
@section('content-title','')
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
            
                <form method ="POST" enctype ="multipart/form-data" action="{{ route('mastersiswa.update', $data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class = "form-group">
                        <label for="nisn">nisn</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value = "{{ $data->nisn}} ">
                    </div>
                    <div class = "form-group">
                        <label for="nama">nama</label>
                        <input type="text" class="form-control" id="nisn" name="nama" value = "{{ $data->nama}} ">
                    </div>
                    <div class = "form-group">
                        <label for="jk">jenis kelamin</label>
                        <select class="form-select form-control" id="jk" name="jk" 
                        value = "{{ $data->jk}}">
                        <option value="laki-laki" @if( $data->jk == 'laki-laki' )selected @endif>laki-laki</option>
                        <option value="perempuan" @if( $data->jk == 'perempuan' )selected @endif>perempuan</option>
                        </select>
                    </div>
                    <div class = "form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value = "{{ $data->alamat}}">
                    </div>
                    <div class = "form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" value = "{{ $data->email}}">
                    </div>
                    <div class = "form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-control-file" id="foto"
                         name="foto">
                         <img src= "{{ asset('./template/img/' .$data->foto) }}" width="300" class = "img-thumbnail">
                    </div>
                    <div class = "form-group">
                        <label for="about">about</label>
                        <textarea type="text" class="form-control" id="about" name="about">{{ $data->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type ="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection