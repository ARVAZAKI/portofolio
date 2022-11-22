
@if ($data->isEmpty())
    <h6 class="text-center">Siswa tidak memiliki kontak</h6>
@else

@foreach($data as $contact)
<div class="card">
<div class="card-header">
    {{ $contact->jenis_kontak}}
</div>
<div class="card-body">
    @foreach ($data->jenis_kontak as $p)
            <h6>contact : {{ $p->jenis_kontak }}</h6>
            @endforeach
    <h6>Deskripsi kontak : {{ $contact->deskripsi}}</h6>
    
</div>
<div class="card-footer">
    <a href="{{ route('mastercontact.edit',$contact->id)}}" class="btn btn-se btn-warning"><i class="fas fa-edit"></i></a>
    <a href="{{ route('mastercontact.destroy', $contact->id) }}" class="btn btn-se btn-danger"><i class="fas fa-trash"></i></a>
</div>
</div>
@endforeach
@endif