<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Mail\Disepnsasi;
use App\Mail\Yudisium;
use App\Mail\BST;
use App\Mail\Cuti;

class PerpustakaanController extends Controller
{
    public function home(){
        return view('perpushome');
    }

    public function perpusdetbst(){
        $pbst = DB::table('dokumen')->where('status', 'setuju by dosen');
        $pbstm = DB::table('dokumen')->where('jenis', 'BST')->where('status', 'setuju by dosen');

        return view('perpusbst', compact('pbst', 'pbstm'));
    }
}
