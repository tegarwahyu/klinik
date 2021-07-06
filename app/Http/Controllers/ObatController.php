<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Redirect;

class ObatController extends Controller
{
    public function toForminputObat(){
        return view('obat.formObat');
    }

    public function getDataObat(){
        $data_obat = Obat::all();
        return view('obat.dataObat',compact('data_obat'));
    }
    
    protected function saveformInputObat(Request $request)
    {
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'jumlah' => $request->jumlah_obat,
            'harga_obat' => $request->harga_obat,
        ]);
        
        return Redirect::back()->with('success','Berhasil Tambah User');
    }

    public function deleteDatatObat($id){
        $data = Obat::where('id',$id);
        $data->delete();
        return Redirect::back()->with('success','Data deleted successfully');
    }
}
