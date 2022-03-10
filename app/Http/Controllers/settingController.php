<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function setting()
    {
        $setting = DB::table('setting')->where('id_set','1')->get();
    	return view('setting',['setting' => $setting]);
    }
    public function updateset(Request $request)
    {
        DB::table('setting')->where('id_set',$request->id_set)->update([
        
            'dispensasi' => $request->dispen,
            'yudisium' => $request->yudi,
            'cuti' => $request->cut,
            'bst' => $request->bst,
            'gjlawal' => $request->gjlawal,
            'gjlakhir' => $request->gjlakhir,
            'gnpawal' => $request->gnpawal,
            'gnpakhir' => $request->gnpakhir,
        ]);
    
        return redirect('/setting');
    }
}
