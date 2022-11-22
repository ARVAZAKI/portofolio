
@if ($data->isEmpty())
    <h6 class="text-center">Siswa tidak memiliki kontak</h6>
@else

@foreach($data as $contact)
<div class="card">
<div class="card-header">

</div>
<div class="card-body">
    <h6>Deskripsi kontak : {{ $contact->deskripsi}}</h6>
</div>
<div class="card-footer">
    <a href="{{ route('mastercontact.edit',$contact->id)}}" class="btn btn-se btn-warning"><i class="fas fa-edit"></i></a>
    <a href="{{ route('mastercontact.hapus', $contact->id) }}" class="btn btn-se btn-danger"><i class="fas fa-trash"></i></a>
</div>
</div>
@endforeach
@endif