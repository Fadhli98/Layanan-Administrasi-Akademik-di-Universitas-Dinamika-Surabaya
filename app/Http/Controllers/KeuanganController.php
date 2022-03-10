<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Mail\Disepnsasi;
use App\Mail\Yudisium;
use App\Mail\BST;
use App\Mail\Cuti;

class KeuanganController extends Controller
{
    public function home(){
        return view('keuanganhome');
    }

    public function keuanganbst(){
        $kbst = DB::table('dokumen')->where('status', 'proses')->count();
        $kbstm = DB::table('dokumen')->where('jenis', 'BST')->where('status', 'setuju by dosen');

        return view('keuanganbst', compact('kbst', 'kbstm'));
    }
}
