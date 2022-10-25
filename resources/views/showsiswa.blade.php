@extends('admin.app')
@section('title','show siswa')
@section('content-title',)
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('./template/img/' .$data->foto) }}" width="250" class="img-thumbnail">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">nisn : {{ $data->nisn }}</li>
                    <li class="list-group-item">nama : {{ $data->nama }}</li>
                    <li class="list-group-item">email : {{ $data->email }}</li>
                    <li class="list-group-item">alamat : {{ $data->alamat}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> About Siswa</h6>
            </div>
            <div class="card-body">
                <h6>{{ $data->about}}</h6>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-briefcase"></i> Project Siswa</h6>
            </div>
            <div class="card-body">
                @foreach ($data->project as $p)
                <h6>nama project : {{ $p->nama_project }}</h6>
                <h6>tanggal pembuatan : {{ $p->tanggal }}</h6>
                <h6>deskripsi : {{ $p->deskripsi }}</h6>
                @endforeach
            </div>
        </div>
      
    </div>
    <div class="col-lg-4    ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-id-badge"></i> Contact Siswa</h6>
            </div>
            <div class="card-body">
            @foreach ($data->kontak as $contact)
            <h6>contact : {{ $contact->deskripsi }}</h6>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection