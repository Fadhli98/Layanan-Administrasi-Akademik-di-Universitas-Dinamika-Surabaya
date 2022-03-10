<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class utamaController extends Controller
{
    public function aak()
    {
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        }
        $date2 = date("Y-m-d",strtotime("-$s->yudisium day"));
        $awal = date_parse($gnpawal);
        $awalbln=($awal['month']);
        $akhirgnp = date_parse($gnpakhir);
        $akhirgnpp=($akhirgnp['month']);
        $akhir = date_parse($gjlakhir);
        $akhirbln=($akhir['month']);
        $month = [];
        for ($m=$awalbln; $m<=12+$akhirbln; $m++) {
             $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
 //ganjil
 $monthlyArray = array();
 $emptyMonth = array('count' => 0, 'month' => 0);
 for($i = $awalbln; $i <= 12; $i++){//generate an array with default values
     $emptyMonth['month'] = $i;
     $monthlyArray[$i-1] = $emptyMonth;
 
 }//genap
 $mongen = array();
 $em = array('count' => 0, 'month' => 0);
 for($i = $awalbln; $i <= $akhirgnpp; $i++){//generate an array with default values
     $em['month'] = $i;
     $mongen[$i-1] = $em;
 }
       
        $ganjil = DB::table('dokumen')
        ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
        ->where('status','selesai')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])
        ->groupBy('month')->orderBy('month')->get()->toarray(); 
    
        foreach($ganjil as $key => $array){//add the results to the default array
                $monthlyArray[$array->month-1] = $array;
        }
        $hslganjil= collect($monthlyArray)->pluck('count');
       
        $genap = DB::table('dokumen')
        ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
        ->where('status','selesai')
        ->whereBetween('created_at', [$gnpawal, $gnpakhir])
        ->groupBy('month')->orderBy('month')->get()->toarray();
        foreach($genap as $key => $array){//add the results to the default array
            $mongen[$array->month-1] = $array;
            
        }
        $hslgenap= collect($mongen)->pluck('count');
        $sts = DB::table('mhs')->where('ket_yud','T')->count();
        $cuti = DB::table('dokumen')->where('status','proses')->where('jenis','Cuti')->count();
    	$yudi = DB::table('dokumen')->where('status','proses')->where('jenis','Yudisium')->count();
    	$bst = DB::table('dokumen')->where('status','proses')->where('jenis','BST')->count();
    	$dis = DB::table('dokumen')->where('status','proses')->where('jenis','Dispensasi')->count();
    	
        $laya = DB::table('dokumen')->where('status','selesai')->whereBetween('created_at', [$gnpawal, $gjlakhir])->orderBy('jurusan','asc')->get();
        $jumlahthnini= DB::table('dokumen')->where('status','selesai')->whereyear('created_at',Carbon::now())->count();
        $jumlahthnlalu = DB::table('dokumen')->where('status','selesai')->whereyear('created_at',Carbon::now()->subyear(1))->count();
        
        $bstindi = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->orderBy('created_at','desc')->get();
        $cutindi = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->orderBy('created_at','desc')->get();
        $disindi = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->orderBy('created_at','desc')->get();
        $jumlahsemester= DB::table('dokumen')->where('status','selesai')
        ->whereBetween('created_at', [$gnpawal, $gjlakhir])->count();
        $gnpaa = strtotime("-1 year", strtotime($gnpawal));
        $gnpa= date('Y-m-d', $gnpaa);
        $gjl= substr($gjlawal,2,2);
        $gnp= substr($gnpa,2,2); 
        if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
            $ydm = DB::table('dokumen')->where('jenis','Yudisium')->where('status','selesai')
            ->whereBetween('created_at', [$gjlawal, $gjlakhir])->count();
        } elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $ydm = DB::table('dokumen')->where('jenis','Yudisium')->where('status','selesai')
            ->whereBetween('created_at', [$gnpawal, $gnpakhir])->count();
        }
        return view('aak',compact('disindi','cutindi','bstindi','sts','ydm','set',
        'jumlahthnlalu','cuti','yudi','bst','dis','month','gjl','gnp','jumlahsemester'
        ,'laya','jumlahthnini','genap','ganjil','monthlyArray','hslgenap','hslganjil'));
    	
    }
}
