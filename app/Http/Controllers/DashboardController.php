<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashcuti()
    {
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        }
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
 ->where('status','selesai')->whereBetween('created_at', [$gjlawal, $gjlakhir])
 ->where('jenis','Cuti')
 ->groupBy('month')->orderBy('month')->get()->toarray(); 

 foreach($ganjil as $key => $array){//add the results to the default array
    
         $monthlyArray[$array->month-1] = $array;
     
 }
 $hslganjil= collect($monthlyArray)->pluck('count');

 $genap = DB::table('dokumen')
 ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
 ->where('status','selesai')->whereBetween('created_at', [$gnpawal, $gnpakhir])
 ->where('jenis','Cuti')
 ->groupBy('month')->orderBy('month')->get()->toarray();
 foreach($genap as $key => $array){//add the results to the default array
     $mongen[$array->month-1] = $array;
     
 }
 $hslgenap= collect($mongen)->pluck('count');

 if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
    $dia = DB::table('dokumen')
    ->select(DB::raw('jurusan as js'))
    ->whereBetween('created_at', [$gjlawal, $gjlakhir])
    ->where('status','selesai')->where('jenis','Cuti')
    ->groupBy(DB::raw('js'))
    ->orderBy('js','asc')
    ->pluck('js');  

$isi = DB::table('dokumen')
->select(DB::raw('count(jurusan) as total'))
->where('status','selesai')->where('jenis','Cuti')
->whereBetween('created_at', [$gjlawal, $gjlakhir])
->groupBy(DB::raw('jurusan'))
->orderBy('jurusan','asc')
->pluck('total');  

$hit = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->count();
$cutimaha = DB::table('dokumen')->whereBetween('created_at', [$gjlawal, $gjlakhir])->where('jenis','Cuti')->where('status','selesai')->orderBy('jurusan','asc')->get();
$cut = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','asc')->get();
$datecut = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','desc')->get();
}
elseif( Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
    $dia = DB::table('dokumen')
    ->select(DB::raw('jurusan as js'))
    ->whereBetween('created_at', [$gnpawal, $gnpakhir])
    ->where('status','selesai')->where('jenis','Cuti')
    ->groupBy(DB::raw('js'))
    ->orderBy('js','asc')
    ->pluck('js');  

    $isi = DB::table('dokumen')
->select(DB::raw('count(jurusan) as total'))
->where('status','selesai')->where('jenis','Cuti')
->whereBetween('created_at', [$gnpawal, $gnpakhir])
->groupBy(DB::raw('jurusan'))
->orderBy('jurusan','asc')
->pluck('total');  
$hit = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->count();
$cutimaha = DB::table('dokumen')->whereBetween('created_at', [$gnpawal, $gnpakhir])->where('status','selesai')->orderBy('jurusan','asc')->get();
$cut = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','asc')->get();
$datecut = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','desc')->get();
} 
$gnpaa = strtotime("-1 year", strtotime($gnpawal));
$gnpa= date('Y-m-d', $gnpaa);
$gjl= substr($gjlawal,2,2);
$gnp= substr($gnpa,2,2); 
      
        return view('dashcuti',compact('datecut','set','dia'
        ,'isi','cut','hit','set','cutimaha','month','hslganjil','hslgenap','gjl','gnp'));
    	
    }
    public function dashdispen()
    {	
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        }
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
        }
        
        //genap
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
        ->where('jenis','Dispensasi')
        ->groupBy('month')->orderBy('month')->get()->toarray(); 
    
        foreach($ganjil as $key => $array){//add the results to the default array
            /*if(in_array($array->month,[1,2,9,10,11,12]))
            {
                $monthlyArray[$array->month-1] = $array;
            }*/
            $monthlyArray[$array->month-1] = $array;
        }
        $hslganjil= collect($monthlyArray)->pluck('count');

        $genap = DB::table('dokumen')
        ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
        ->where('status','selesai')
        ->whereBetween('created_at', [$gnpawal, $gnpakhir])
        ->where('jenis','Dispensasi')
        ->groupBy('month')->orderBy('month')->get()->toarray();
        foreach($genap as $key => $array){//add the results to the default array
            $mongen[$array->month-1] = $array;
            
        }
        $hslgenap= collect($mongen)->pluck('count');

        //Kondisi Ganjil
        if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gjlawal, $gjlakhir])
            ->where('status','selesai')->where('jenis','Dispensasi')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

        $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','Dispensasi')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  

        $hit = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])->count();
        $dispmaha = DB::table('dokumen')->whereBetween('created_at', [$gjlawal, $gjlakhir])->where('jenis','Dispensasi')->where('status','selesai')->orderBy('jurusan','asc')->get();
        $dis = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','asc')->get();
        $datedis = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','desc')->get();
    }
    //Kondisi Genap
        elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gnpawal, $gnpakhir])
            ->where('status','selesai')->where('jenis','Dispensasi')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

            $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','Dispensasi')
        ->whereBetween('created_at', [$gnpawal, $gnpakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  
        $hit = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->count();
        $dispmaha = DB::table('dokumen')->whereBetween('created_at', [$gnpawal, $gnpakhir])->where('status','selesai')->orderBy('jurusan','asc')->get();
        $dis = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','asc')->get();
        $datedis = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','desc')->get();
        }
        $gnpaa = strtotime("-1 year", strtotime($gnpawal));
        $gnpa= date('Y-m-d', $gnpaa);
        $gjl= substr($gjlawal,2,2);
        $gnp= substr($gnpa,2,2);

        return view('dashdispen',compact('gnpa','datedis','dis','hit','set','dispmaha',
        'dia','isi','month','akhirbln','hslganjil','hslgenap','gjl','gnp'));
    }
    public function dashbst()
    {
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        }
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
 ->where('jenis','BST')
 ->groupBy('month')->orderBy('month')->get()->toarray(); 

 foreach($ganjil as $key => $array){//add the results to the default array
         $monthlyArray[$array->month-1] = $array;
 }
 $hslganjil= collect($monthlyArray)->pluck('count');

 $genap = DB::table('dokumen')
 ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
 ->where('status','selesai')
 ->whereBetween('created_at', [$gnpawal, $gnpakhir])
 ->where('jenis','BST')
 ->groupBy('month')->orderBy('month')->get()->toarray();
 foreach($genap as $key => $array){//add the results to the default array
     $mongen[$array->month-1] = $array;
     
 }
 $hslgenap= collect($mongen)->pluck('count');

        //Kondisi Ganjil
        if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gjlawal, $gjlakhir])
            ->where('status','selesai')->where('jenis','BST')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

        $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','BST')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  

        $hit = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->count();
        $bstmaha = DB::table('dokumen')->whereBetween('created_at', [$gjlawal, $gjlakhir])->where('jenis','BST')->where('status','selesai')->orderBy('jurusan','asc')->get();
        $bst = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','asc')->get();
        $datebst = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','desc')->get();
    }
    elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gnpawal, $gnpakhir])
            ->where('status','selesai')->where('jenis','BST')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

            $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','BST')
        ->whereBetween('created_at', [$gnpawal, $gnpakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  
        $hit = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->count();
        $bstmaha = DB::table('dokumen')->whereBetween('created_at', [$gnpawal, $gnpakhir])->where('status','selesai')->orderBy('jurusan','asc')->get();
        $bst = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','asc')->get();
        $datebst = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','desc')->get();
        }
        $gnpaa = strtotime("-1 year", strtotime($gnpawal));
        $gnpa= date('Y-m-d', $gnpaa);
        $gjl= substr($gjlawal,2,2);
        $gnp= substr($gnpa,2,2); 
        return view('dashbst',compact('datebst','dia','isi','gjl','gnp',
        'bst','hit','set','bstmaha','month','hslganjil','hslgenap'));
    }
    public function dashyudi()
    {
        $set = DB::table('setting')->where('id_set','1')->get();
        foreach($set as $s){
            $gjlawal=$s->gjlawal;
            $gnpawal=$s->gnpawal;
            $gjlakhir=$s->gjlakhir;
            $gnpakhir=$s->gnpakhir;
        }
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
 ->where('status','selesai')->whereBetween('created_at', [$gjlawal, $gjlakhir])->where('jenis','Yudisium')
 ->groupBy('month')->orderBy('month')->get()->toarray(); 

 foreach($ganjil as $key => $array){//add the results to the default array
         $monthlyArray[$array->month-1] = $array;
 }
 $hslganjil= collect($monthlyArray)->pluck('count');

 $genap = DB::table('dokumen')
 ->select(DB::raw('count(*) as count,MONTH(created_at) as month'))
 ->where('status','selesai')
 ->where('created_at', '>=', Carbon::parse('first day of march'))
 ->where('created_at', '<=', Carbon::parse('last day of august'))
 ->whereyear('created_at',Carbon::now())->where('jenis','Yudisium')
 ->groupBy('month')->orderBy('month')->get()->toarray();
 foreach($genap as $key => $array){//add the results to the default array
     $mongen[$array->month-1] = $array;
     
 }
 $hslgenap= collect($mongen)->pluck('count');


        if(Carbon::now()>=$gjlawal && Carbon::now()<=$gjlakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gjlawal, $gjlakhir])
            ->where('status','selesai')->where('jenis','Yudisium')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

        $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','Yudisium')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  

        $ydm = DB::table('dokumen')->where('jenis','Yudisium')->where('status','selesai')
        ->whereBetween('created_at', [$gjlawal, $gjlakhir])->count();
        $ydmaha = DB::table('dokumen') ->whereBetween('created_at', [$gjlawal, $gjlakhir])->where('jenis','Yudisium')->where('status','selesai')->orderBy('jurusan','asc')->get();
        $yudi = DB::table('dokumen')->where('jenis','Yudisium')->where('status','proses')->whereBetween('created_at', [$gjlawal, $gjlakhir])->orderBy('created_at','asc')->get();
     
    }
        elseif(Carbon::now()>=$gnpawal && Carbon::now()<=$gnpakhir){
            $dia = DB::table('dokumen')
            ->select(DB::raw('jurusan as js'))
            ->whereBetween('created_at', [$gnpawal, $gnpakhir])
            ->where('status','selesai')->where('jenis','Yudisium')
            ->groupBy(DB::raw('js'))
            ->orderBy('js','asc')
            ->pluck('js');  

            $isi = DB::table('dokumen')
        ->select(DB::raw('count(jurusan) as total'))
        ->where('status','selesai')->where('jenis','Yudisium')
        ->whereBetween('created_at', [$gnpawal, $gnpakhir])
        ->groupBy(DB::raw('jurusan'))
        ->orderBy('jurusan','asc')
        ->pluck('total');  
        $ydm = DB::table('dokumen')->where('jenis','Yudisium')->where('status','selesai')->whereBetween('created_at', [$gnpawal, $gnpakhir])->count();
        $ydmaha = DB::table('dokumen')->whereBetween('created_at', [$gnpawal, $gnpakhir])->where('status','selesai')->orderBy('jurusan','asc')->get();
        $yudi = DB::table('dokumen')->where('jenis','Yudisium')->where('status','proses')->whereBetween('created_at', [$gnpawal, $gnpakhir])->orderBy('created_at','asc')->get();
        }

        $gnpaa = strtotime("-1 year", strtotime($gnpawal));
        $gnpa= date('Y-m-d', $gnpaa);
        $gjl= substr($gjlawal,2,2);
        $gnp= substr($gnpa,2,2);
        $sts = DB::table('mhs')->where('ket_yud','S')->count();
      
        
        return view('dashyudi',compact('dia','isi','yudi','gnp','gjl',
        'set','sts','ydm','ydmaha','month','hslganjil','hslgenap'));
    }
}