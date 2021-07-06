<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Obat;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

class TransacController extends Controller
{
    protected function tindakPasien($id){
        $data = Transaksi::where('kode_transaksi',$id)->with('data_user','data_obat')->get();
        $obat = Obat::all();
        return view('users.transakPasien',compact(['data', 'obat']));
    }

    protected function saveformTindakPasien(Request $request)
    {
        dd($request);
        $obat = Obat::find($request->id_obat);
        $harga_obat = $obat->harga * $request->jumlah_obat_yg_dibayar;
        $jumlah_obat_sekarang = $obat->jumlah - $request->jumlah_obat_yg_dibayar;
        $obat['jumlah'] = $jumlah_obat_sekarang;
        $obat->save();
        // dd($jumlah_obat_sekarang);
        
        $post = Transaksi::find($request->transaksi_id)->update(['obat_id' => $request->id_obat,
        'status' => '1','jumlah_obat' => $request->jumlah_obat_yg_dibayar, 'jumlah_yang_dibayar' => $harga_obat]);

        // return Redirect::back()->with('success','Berhasil Tambah User');
    }

    protected function toBayarPasien($id)
    {

        $data_pasien = Transaksi::where('kode_transaksi',$id)->with('data_user','data_obat')->get();
        // dd($data_pasien);
        return view('obat.bayarObat', compact('data_pasien'));
        // return Redirect::back()->with('success','Berhasil Tambah User');
    }

    public function saveformPembayaranObat(Request $request)
    {
        foreach ($request->bukti_pembayaran as $bukti ) {
            
            $filename = $bukti->getClientOriginalName(); /*dirubah ke store seharusnya*/
            if($filename !== null ){
                if (! File::exists(public_path()."/storage/bukti_pembayaran")) {
                    File::makeDirectory(public_path()."/storage/bukti_pembayaran", 0755, true);
                }
            $path = $bukti->move(public_path()."/storage/bukti_pembayaran" , $filename);
            }
            $data = Transaksi::find($request->id_transaksi);
            $data->bukti = ($filename !== null ) ? url('/storage/bukti_pembayaran/'.$filename) : null;
            $data->save();
        }

        return back()->with('success', 'Your sertifikat has been successfully');
    }

    public function LihatPembayaranPasien($id){
        $data_pasien = User::where('is_user','1')->get();
        $data = DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.user_id')
        ->get();
        $bukti_pembayaran = Transaksi::where('kode_transaksi',$id)->get();
        return view('users.home', compact(['bukti_pembayaran','data']));
    }

    protected function saveformPendaftaranPasien(Request $request)
    {
        $length = 10;
        Transaksi::create([
            'user_id' => $request->user_id,
            'keluhan' => $request->keluhan,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'kode_transaksi' => substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length),
        ]);
        
        return Redirect::back()->with('success','Pasien Berhasil Daftar');
    }
    
}
