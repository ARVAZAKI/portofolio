@extends('admin.app')
@section('title','edit Contact')
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
            
                <form method ="POST" enctype ="multipart/form-data" action="{{ route('mastercontact.update', $data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <h3>Edit Contact</h3>
                    <div class = "form-group">
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value = "{{ $data->id_siswa}} ">
                    </div>
                    <div class = "form-group">
                        <label for="nama_project">id jenis</label>
                        <input type="hidden" class="form-control" id="id_jenis" name="id_jenis" value = "{{ old('id_jenis')}} ">
                    </div>
                    <div class = "form-group">
                        <label for="deskripsi">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value = "{{ old('deskripsi')}}">
                    </div>
                    <div class="form-group">
                        <input type ="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection