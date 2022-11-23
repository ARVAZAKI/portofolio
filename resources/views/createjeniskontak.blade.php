@extends('admin.app')
@section('title','Create jenis kontak')
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

                <form method ="POST" enctype ="multipart/form-data" action="{{route('masterjeniskontak.store')}}">
                    @csrf
                    <div class = "form-group">
                        <label for="id_jenis"></label>
                        <input type="hidden" class="form-control" id="id_jenis" name="id_jenis" value = "{{ old('id_jenis')}} ">
                    </div>
                    <div class = "form-group">
                        <label for="jenis_kontak">jenis kontak</label>
                        <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak" value = "{{ old('jenis_kontak')}}">
                    </div>
                    <div class="form-group">
                        <input type ="submit" class="btn btn-success" value="Simpan">
                        <a href="{{ route('masterjeniskontak.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection