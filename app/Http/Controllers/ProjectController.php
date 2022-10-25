<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\Siswa;
use Illuminate\Http\Request;




class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Project::all();
        $siswa = Siswa::all();
        return view('admin.masterproject',compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $siswa = Siswa::find($id);
        return view('createproject',compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'nama' => ':attribute minimal :min karakter',
            'max' => ':attribute max :max karakter',
            'numeric' => ':attribute harus angka',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,svg,png'

        ];
        $this->validate($request,[
            'id_siswa' => 'required|numeric',
            'nama_project' => 'required|min:5|max:50',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:5',
            'foto' => 'required|required|mimes:jpg,jpeg,svg,png,gif,pdf',
        ],$messages);

        $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img/';
        $file->move ($tujuan_upload,$nama_file);
        Project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project' => $request->nama_project,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $nama_file
        ]);
        return redirect('masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = Siswa::find($id)->project()->get();
        return view('showproject',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::find($id);
        return view('editproject', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'nama' => ':attribute minimal :min karakter',
            'max' => ':attribute max :max karakter',
            'numeric' => ':attribute harus angka',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,svg,png'

        ];
        $this->validate($request,[
            'nama_project' => 'required|min:5|max:50',
            'tanggal' => 'required',
            'deskripsi' => 'required|min:5',
            'foto' => 'mimes:jpg,jpeg,svg,png,gif',
        ],$messages);

        if($request->foto != ""){

            $project = Project::find($id);
            file::delete('./template/img'.$project->foto);
            $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img';
        $file->move ($tujuan_upload,$nama_file);
        $project->id_siswa=$request->id_siswa;
        $project->nama_project=$request->nama_project;
        $project->tanggal=$request->tanggal;
        $project->deskripsi=$request->deskripsi;
        $project->foto=$nama_file;
        $project->update();
        return redirect('mastersiswa');
        }
        else{
            $project = Project::find($id);
            $project->id_siswa=$request->id_siswa;
            $project->nama_project=$request->nama_project;
            $project->tanggal=$request->tanggal;
            $project->save();
            return redirect('masterproject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function hapus($id)
    {
        $data=Project::find($id)->delete();
        return redirect('masterproject');
        

    }

}