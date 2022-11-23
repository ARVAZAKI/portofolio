@extends('admin.app')
@section('title','Jenis kontak')
@section('content-title')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <a href="{{ route('masterjeniskontak.create') }}" class="btn btn-primary">Create</a>
      <div class="card shadow mb-4">
        
          <div class="card-header py-3">
              Jenis kontak
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th colspan="2">Jenis kontak</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($jeniskontak as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->jenis_kontak }}</td>
                                  <td>
                                    <a href="{{ route('masterjeniskontak.hapus', $item->id) }}" class="btn btn-se btn-danger"><i class="fas fa-trash"></i></a>
                                  </td>
                              </tr>
                      
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
    @endsection