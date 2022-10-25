
@if ($data->isEmpty())
    <h6 class="text-center">Siswa tidak memiliki project</h6>
@else

    @foreach($data as $item)
    <div class="card">
    <div class="card-header">
        {{ $item->nama_project}}
    </div>
    <div class="card-body">
        <h6>Tanggal project</h6>
        {{ $item->tanggal}}
        <h6>Deskripsi project</h6>
        {{ $item->deskripsi}}
    </div>
    <div class="card-footer">
        <a href="{{ route('masterproject.edit',$item->id)}}" class="btn btn-se btn-warning"><i class="fas fa-edit"></i></a>
        <a href="{{ route('masterproject.hapus', $item->id) }}" class="btn btn-se btn-danger"><i class="fas fa-trash"></i></a>
    </div>
</div>
@endforeach
@endif