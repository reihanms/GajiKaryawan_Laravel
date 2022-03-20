<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;

class GajiController extends Controller
{
    //
    public function index(){
        $data = Gaji::all();
        return view('index',compact('data'));
    }

    public function store(Request $request){

        $validasi = $request->validate([
            'nik' => 'required|unique:gaji|max:16',
            'nama' => 'required|max:255|string',
            'jns_klm' =>'required|max:20',
            'golongan' => 'required|max:2',
            'status' => 'required|max:255',
            'gapok' => 'required',
            'tunjangan' => 'required',
            'potongan' => 'required',
            'total' => 'required',
        ]);
        
        // save database
        Gaji::create($validasi);
        
        //redirecting
        return redirect('/')->with('success','Data Berhasil Disimpan Ke Database :)'); 
    }

    public function delete($nik){
        $data = Gaji::find($nik);
        $data->delete();

        return redirect('/')->with('success','Data Berhasil Di Delete'); 
    }
}
