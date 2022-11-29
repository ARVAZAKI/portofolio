<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Kontak;
use App\Models\JenisKontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();
        $siswa = Siswa::all();
        $jeniskontak = JenisKontak::all();
        return view('admin.mastercontact',compact('kontak','siswa','jeniskontak'));

    }
    public function buatkontak($id){
        $siswa = Siswa::find($id);
        $jenis_kontak = JenisKontak::all();
        return view('createcontact', compact('siswa','jenis_kontak'));
    }

    public function makekontak(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'nama' => ':attribute minimal :min karakter',
            'max' => ':attribute max :max karakter',
            'numeric' => ':attribute harus angka',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,svg,png'

        ];
        $this->validate($request,[
            'id_jenis' => 'required',
            'deskripsi' => 'required'
        ],$messages);
        Kontak::create([
            'id_siswa' => $request->id_siswa,
            'id_jenis' => $request->id_jenis,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('mastercontact');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = Siswa::find($id);
        return view('createcontact',compact('siswa'));
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
            'id_jenis' => 'required',
            'deskripsi' => 'required'
        ],$messages);
        Kontak::create([
            'id_siswa' => $request->id_siswa,
            'id_jenis' => $request->id_jenis,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('mastercontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id)->kontak()->get();
        return view('showcontact',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kontak::find($id);
        return view('editcontact', compact('data'));    }

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
            'id_jenis' => 'required',
            'deskripsi' => 'required'
        ],$messages);

        Kontak::create([
            'id_jenis' => $request->id_jenis,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('mastercontact');
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
    public function hapus($id){
        $kontak=Kontak::find($id)->delete();
        return redirect('mastercontact');
    }
}
