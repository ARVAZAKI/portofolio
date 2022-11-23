<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use App\Models\JenisKontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JeniskontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();
        $jeniskontak = JenisKontak::all();
        return view('admin.masterjeniskontak',compact('kontak','jeniskontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('createjeniskontak');
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

        ];
        $this->validate($request,[
            'jenis_kontak' => 'required|min:3|max:50',
        ],$messages);

        JenisKontak::create([
            'jenis_kontak' => $request->jenis_kontak,
        ]);
        return redirect('masterjeniskontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = JenisKontak::find($id)->JenisKontak()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $data=JenisKontak::find($id)->delete();
        return redirect('masterjeniskontak');
        

    }
}
