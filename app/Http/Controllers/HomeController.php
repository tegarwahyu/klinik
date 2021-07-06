<?php
   
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminHome()
    {
        return view('admin.home');
    }

    public function users(){
        $user = User::all();
        return view('admin.users', compact('user'));
    }

    public function toForminputUser(){
        return view('admin.formCreaeteUser');
    }

    protected function saveForminputUser(Request $request)
    {
        if($request->hakAkses == 'admin'){
            $admin = 1;
            $user = null;
            $pegawai = null;
        }else if($request->hakAkses == 'user'){
            $user = 1;
            $admin = null;
            $pegawai = null;
        }else if($request->hakAkses == 'pegawai'){
            $pegawai = 1;
            $admin = null;
            $user = null;
        }
        User::create([
            'name' => $request->username,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => $admin,
            'is_user' => $user,
            'is_pegawai' => $pegawai,
        ]);
        
        return redirect('form.user')->with('success','Berhasil Tambah User');
    }

    public function deleteDatatUser($id)
    {
        $data = User::where('id',$id);
        $data->delete();
        return redirect()->route('user')
                        ->with('success','Data deleted successfully');
    }

    public function getDataPasien(){
        $data_pasien = User::where('is_user','1')->get();
        $data = DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.user_id')
        ->get();
        // dd($data);
        return view('users.home',compact('data'));
    }

    public function toFormDaftarPasien(){
        $id_user = Auth::user()->id;
        $data = User::where('id',$id_user)->first();
        return view('admin.formPasien',compact('data'));
    }

    public function getDataChart(){
        $data = DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.user_id')
        ->join('obats','obats.id','=','transaksis.obat_id')
        ->get();
        $done = Transaksi::where('bukti','!=','null')->get();
        $undone = Transaksi::where('bukti','==','null')->get();
        $user = User::all();

        return response()->json(['transaksi'=> $data,'user'=>$user,'done'=>$done,'undone'=>$undone]);
        // return view('admin.home',['data'=>$data]);
    }
    
}