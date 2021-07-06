<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usersiHome()
    {
        $data_pasien = User::where('is_user','1')->get();
        $data = DB::table('transaksis')
        ->join('users', 'users.id', '=', 'transaksis.user_id')
        ->get();
        // dd($data);
        return view('users.home',compact('data'));
    }

    public function formUserDaftarPasien(){
        $id_user = Auth::user()->id;
        $data = User::where('id',$id_user)->first();
        return view('users.formPasienUser',compact('data'));
    }
}
