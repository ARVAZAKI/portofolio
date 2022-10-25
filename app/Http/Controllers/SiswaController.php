<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use File;
use Illuminate\Support\Facades\Redirect;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Siswa::all();
        return view('admin.mastersiswa',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createsiswa');
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
            'nisn' => 'required|numeric',
            'nama' => 'required|min:5|max:50',
            'jk' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,svg,png',
            'about' => 'required'
        ],$messages);

        $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img/';
        $file->move ($tujuan_upload,$nama_file);
        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'foto' => $nama_file,
            'about' => $request->about
        ]);
        return redirect('mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Siswa::find($id);
        return view('showsiswa',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('editsiswa', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
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
            'nisn' => 'required|numeric',
            'nama' => 'required|min:5|max:50',
            'jk' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'foto' => 'mimes:jpg,jpeg,svg,png,gif,pdf',
            'about' => 'required'
        ],$messages);

        if($request->foto != ""){

            $siswa = Siswa::find($id);
            file::delete('./template/img'.$siswa->foto);
            $file = $request->file('foto');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $tujuan_upload = './template/img';
        $file->move ($tujuan_upload,$nama_file);
        $siswa->nisn=$request->nisn;
        $siswa->nama=$request->nama;
        $siswa->jk=$request->jk;
        $siswa->alamat=$request->alamat;
        $siswa->email=$request->email;
        $siswa->about=$request->about;
        $siswa->foto=$nama_file;
        $siswa->update();
        return redirect('mastersiswa');
        }
        else{
            $siswa = Siswa::find($id);
            $siswa->nisn=$request->nisn;
            $siswa->nama=$request->nama;
            $siswa->jk=$request->jk;
            $siswa->alamat=$request->alamat;
            $siswa->email=$request->email;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect('mastersiswa');
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
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
    