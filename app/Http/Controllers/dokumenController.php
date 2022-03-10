<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\dokumendispen;
use App\Exports\dispenExport;
use App\Exports\cutiExport;
use App\Exports\bstExport;
use App\Exports\yudiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
class dokumenController extends Controller
{
    public function dokdispen()
    {
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        } if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
        $lapdis = DB::table('dokumen')->where('jenis','Dispensasi')->whereBetween('created_at', [$gjlawal, $gjlakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        } elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $lapdis = DB::table('dokumen')->where('jenis','Dispensasi')->whereBetween('created_at', [$gnpawal, $gnpakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        }
        return view('dokdispen',compact('lapdis'));
}
public function dokcuti()
{
    $set = DB::table('setting')->where('id_set','1')->get();
    foreach($set as $s){
        $gjlawal=$s->gjlawal;
        $gnpawal=$s->gnpawal;
        $gjlakhir=$s->gjlakhir;
        $gnpakhir=$s->gnpakhir;
    } if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
    $lapdis = DB::table('dokumen')->where('jenis','Cuti')->whereBetween('created_at', [$gjlawal, $gjlakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
    } elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
        $lapdis = DB::table('dokumen')->where('jenis','Cuti')->whereBetween('created_at', [$gnpawal, $gnpakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
    }
    return view('dokcuti',compact('lapdis'));
}
public function dokbst()
{
    $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        } if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
        $lapdis = DB::table('dokumen')->where('jenis','BST')->whereBetween('created_at', [$gjlawal, $gjlakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        } elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $lapdis = DB::table('dokumen')->where('jenis','BST')->whereBetween('created_at', [$gnpawal, $gnpakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        }
    return view('dokbst',compact('lapdis'));
}
public function dokyudi()
{
    $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        } if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
        $lapdis = DB::table('dokumen')->where('jenis','Yudisium')->whereBetween('created_at', [$gjlawal, $gjlakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        } elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $lapdis = DB::table('dokumen')->where('jenis','Yudisium')->whereBetween('created_at', [$gnpawal, $gnpakhir])->wherein('status',['selesai','ditolak by aak'])->orderBy('jurusan','asc')->get();
        }
    return view('dokyudi',compact('lapdis'));
}
public function export_excel()
	{
		return Excel::download(new dispenExport, 'dispen.xlsx');
	}
    public function export_cuti()
	{
		return Excel::download(new cutiExport, 'cuti.xlsx');
	}
    public function export_yudi()
	{
		return Excel::download(new yudiExport, 'yudisium.xlsx');
	}
    public function export_bst()
	{
		return Excel::download(new bstExport, 'bst.xlsx');
	}
}
