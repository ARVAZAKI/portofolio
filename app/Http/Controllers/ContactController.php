<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontak::all();
        $siswa = Siswa::all();
        return view('admin.mastercontact',compact('kontak','siswa'));
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
        $kontak = Kontak::find($id);
        return view('editcontact', compact('kontak'));    }

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
        $kontak=Kontak::find($id)->delete();
        return redirect('mastercontact');
    }
}
