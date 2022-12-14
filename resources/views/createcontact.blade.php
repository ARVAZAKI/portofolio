@extends('admin.app')
@section('title','Create contact')
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

                <form method ="GET" enctype ="multipart/form-data" action="{{route('make.kontak')}}">
                    @csrf
                    <h3>Create Contact - {{ $siswa->nama }}</h3>
                    <div class = "form-group">
                        <label for="id_siswa"></label>
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value = "{{ $siswa->id}} ">
                    </div>
                    <select name="id_jenis" id="inputGroupSelect01" class="custom-select">
                        <option selected>-</option>                    
                        @foreach ($jenis_kontak as $jns)
                        <option value="{{$jns->id}}">{{$jns->jenis_kontak}}</option>
                        @endforeach                   
                    </select>
                    <div class = "form-group mt-3">
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