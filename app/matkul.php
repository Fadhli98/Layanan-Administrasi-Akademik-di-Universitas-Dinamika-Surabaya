<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class matkul extends Authenticatable
{
    public function pkn(){
        $pkn = DB::select('select * from matkul_pkn');
    }
}
?>