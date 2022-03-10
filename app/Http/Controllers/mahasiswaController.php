<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Mail\Disepnsasi;
use App\Mail\Yudisium;
use App\Mail\BST;
use App\Mail\Cuti;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class mahasiswaController extends Controller
{
    public function mhscuti()
    {
        $ct = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->count();
        $ctt = DB::table('dokumen')->where('jenis','Cuti')->where('status','setuju by dosen')->count();
        $cttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','setuju by kaprodi')->count();
        $ctttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by dosen')->count();
        $cttttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by kaprodi')->count();
        $ctttttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by aak')->count();
        $cttttttt = DB::table('dokumen')->where('jenis','Cuti')->wherein('status',['update ke dosen','update ke aak'])->count();
        // $ctttttttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','update by mhs ke kaprodi')->count();
        // $cttttttttt = DB::table('dokumen')->where('jenis','Cuti')->where('status','update by mhs ke aak')->count();
        $ctmaha = DB::table('dokumen')->where('jenis','Cuti')->where('status','proses')->get();
        $ctmahas = DB::table('dokumen')->where('jenis','Cuti')->where('status','setuju by dosen')->get();
        $ctmahass = DB::table('dokumen')->where('jenis','Cuti')->where('status','setuju by kaprodi')->get();
        $ctmahasss = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by dosen')->get();
        $ctmahassss = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by kaprodi')->get();
        $ctmahasssss = DB::table('dokumen')->where('jenis','Cuti')->where('status','ditolak by aak')->get();
        $ctmahassssss = DB::table('dokumen')->where('jenis','Cuti')->wherein('status',['update ke dosen','update ke aak'])->get();
        // $ctmahasssssss = DB::table('dokumen')->where('jenis','Cuti')->where('status','update by kaprodi')->get();
        // $ctmahassssssss = DB::table('dokumen')->where('jenis','Cuti')->where('status','update by aak')->get();
        
        return view('mhscuti', compact('ct', 'ctt', 'cttt', 'ctttt', 'cttttt', 'ctttttt', 'cttttttt', 'ctmaha', 'ctmahas', 'ctmahass', 'ctmahasss', 'ctmahassss', 'ctmahasssss', 'ctmahassssss'));
    }

    public function lapcuti(){
        $ct = DB::table('dokumen')->where('jenis','Cuti')->where('nim',Auth::user()->nim)->where('status','selesai')->count();
        $ctmaha = DB::table('dokumen')->where('jenis','Cuti')->where('nim',Auth::user()->nim)->where('status','selesai')->get();
        
        return view('mhslapcuti', compact('ct', 'ctmaha'));
    }

    public function mhsdispen()
    {
    	$dp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->count();
    	$dpp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','setuju by dosen')->count();
    	$dppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','setuju by kaprodi')->count();
    	$dpppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by dosen')->count();
    	$dppppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by kaprodi')->count();
    	$dpppppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by aak')->count();
    	$dppppppp = DB::table('dokumen')->where('jenis','Dispensasi')->wherein('status',['update ke kaprodi','update ke aak'])->count();
    	// $dpppppppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke dosen')->count();
    	// $dppppppppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke kaprodi')->count();
    	// $dpppppppppp = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke aak')->count();
        $dpmaha = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','proses')->get();
        $dpmahas = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','setuju by dosen')->get();
        $dpmahass = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','setuju by kaprodi')->get();
        $dpmahasss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by dosen')->get();
        $dpmahassss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by kaprodi')->get();
        $dpmahasssss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','ditolak by aak')->get();
        $dpmahassssss = DB::table('dokumen')->where('jenis','Dispensasi')->wherein('status',['update ke kaprodi','update ke aak'])->get();
        // $dpmahasssssss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke dosen')->get();
        // $dpmahassssssss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke kaprodi')->get();
        // $dpmahasssssssss = DB::table('dokumen')->where('jenis','Dispensasi')->where('status','update by mhs ke aak')->get();
        
        return view('mhsdispen', compact('dp', 'dpp', 'dppp', 'dpppp', 'dppppp', 'dpppppp', 'dpppppp', 'dpmaha', 'dpmahas', 'dpmahass', 'dpmahasss', 'dpmahassss', 'dpmahasssss', 'dpmahassssss'));
    }

    public function lapdispen()
    {
    	$dp = DB::table('dokumen')->where('jenis','Dispensasi')->where('nim', Auth::user()->nim)->where('status','selesai')->count();
    	$dpmaha = DB::table('dokumen')->where('jenis','Dispensasi')->where('nim', Auth::user()->nim)->where('status','selesai')->get();
        
        return view('mhslapdispen', compact('dp', 'dpmaha'));
    }

    public function mhsbst()
    {
    	$bs = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->count();
    	$bss = DB::table('dokumen')->where('jenis','BST')->where('status','setuju by dosen')->count();
    	$bsss = DB::table('dokumen')->where('jenis','BST')->where('status','setuju by kaprodi')->count();
    	$bssss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by dosen')->count();
    	$bsssss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by kaprodi')->count();
    	$bssssss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by aak')->count();
    	$bsssssss = DB::table('dokumen')->where('jenis','BST')->wherein('status',['update ke dosen','update ke kaprodi','update ke aak'])->count();
    	// $bssssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke dosen')->count();
    	// $bsssssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke kaprodi')->count();
    	// $bssssssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke aak')->count();
    	$bsmaha = DB::table('dokumen')->where('jenis','BST')->where('status','proses')->get();
        $bsmahas = DB::table('dokumen')->where('jenis','BST')->where('status','setuju by dosen')->get();
        $bsmahass = DB::table('dokumen')->where('jenis','BST')->where('status','setuju by kaprodi')->get();
        $bsmahasss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by dosen')->get();
        $bsmahassss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by kaprodi')->get();
        $bsmahasssss = DB::table('dokumen')->where('jenis','BST')->where('status','ditolak by aak')->get();
        $bsmahassssss = DB::table('dokumen')->where('jenis','BST')->wherein('status',['update ke dosen','update ke kaprodi','update ke aak'])->get();
        // $bsmahasssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke dosen')->get();
        // $bsmahassssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke kaprodi')->get();
        // $bsmahasssssssss = DB::table('dokumen')->where('jenis','BST')->where('status','update by mhs ke aak')->get();
        
        return view('mhsbst', compact('bs', 'bss', 'bsss', 'bssss', 'bsssss', 'bssssss', 'bsssssss', 'bsmaha', 'bsmahas', 'bsmahass', 'bsmahasss', 'bsmahassss', 'bsmahasssss', 'bsmahassssss'));
    }

    public function lapbst()
    {
    	$bs = DB::table('dokumen')->where('jenis','BST')->where('nim', Auth::user()->nim)->where('status','selesai')->count();
    	$bsmaha = DB::table('dokumen')->where('jenis','BST')->where('nim',Auth::user()->nim)->where('status','selesai')->get();
        
        return view('mhslapbst', compact('bs', 'bsmaha'));
    }

    public function mhsyudi()
    {
    	$yd = DB::table('dokumen')->where('status','proses')->count();
    	$ydm = DB::table('dokumen')->where('status','ditolak by aak')->count();
    	$ydmm = DB::table('dokumen')->where('status','update ke aak')->count();
    	$ydmaha = DB::table('dokumen')->where('jenis','Yudisium')->where('status','proses')->get();
        $ydmahas = DB::table('dokumen')->where('jenis','Yudisium')->where('status','ditolak by aak')->get();
        $ydmahass = DB::table('dokumen')->where('jenis','Yudisium')->where('status','update ke aak')->get();
        
        return view('mhsyudi', compact('yd', 'ydm', 'ydmm', 'ydmaha', 'ydmahas', 'ydmahass'));
    }

    public function lapyudi()
    {
    	$ydm = DB::table('dokumen')->where('nim',Auth::user()->nim)->where('status','selesai')->count();
    	$ydmaha = DB::table('dokumen')->where('jenis','Yudisium')->where('nim',Auth::user()->nim)->where('status','selesai')->get();
        
        return view('mhslapyudi', compact('ydm', 'ydmaha'));
    }
    

    public function createdispensasi(Request $request){
        $date = Carbon::now();
        $s = DB::table('matkul_pkn')->where('nim', '=', Auth::user()->nim)->value('sakit');
        $i = DB::table('matkul_pkn')->where('nim', '=', Auth::user()->nim)->value('ijin');
        $a = DB::table('matkul_pkn')->where('nim', '=', Auth::user()->nim)->value('alpha');
        
        \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\Dispensasi);
        
        if($s < 2 && $i < 2 && $a < 2){
            $berkas= $request->berkas_ketidakhadiran;
            $nama_berkas = $request->file('berkas_ketidakhadiran')->getClientOriginalName();
            
            DB::table('dokumen')->insert([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'tanggal_absen'     => $request->absen,
                'tanggal_masuk'     => $request->masuk,
                'jenis'             => 'Dispensasi',
                'berkas_dispensasi' => $nama_berkas,
                'status'            => 'proses',
                'created_at'        => $date
            ]);
            
            
            $tujuan_simpan = public_path('/berkas_mhs/'.Auth::user()->nim.'_Dispensasi');
            $berkas->move($tujuan_simpan, $nama_berkas);
            
           return redirect('/mhs')->with('alert', 'Pengajuan dispensasi anda berhasil di upload! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
        }else{
            return redirect('/mhs')->with('alert', 'Mohon maaf, pengajuan dispensasi anda ditolak! Alasan : Jumlah sakit/ijin/alpha anda melebihi batas.');
        }
        
        
    }

    public function edispen(Request $request, $id){
        $date = Carbon::now();
        
        $berkas= $request->berkas;
        
        $nama_berkas = $request->file('berkas')->getClientOriginalName();
        
        if(DB::table('dokumen')->where('id', $id)->value('status') == 'ditolak by kaprodi'){
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\dispensasi_edit_ke_kaprodi);

            DB::table('dokumen')->where('id',$id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'tanggal_absen'     => $request->absen,
                'tanggal_masuk'     => $request->masuk,
                'jenis'             => 'Dispensasi',
                'berkas_dispensasi' => $nama_berkas,
                'status'            => 'update ke kaprodi',
                'created_at'        => $date
            ]);
        }else{
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\dispensasi_edit_ke_aak);
            DB::table('dokumen')->where('id',$id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'tanggal_absen'     => $request->absen,
                'tanggal_masuk'     => $request->masuk,
                'jenis'             => 'Dispensasi',
                'berkas_dispensasi' => $nama_berkas,
                'status'            => 'update ke aak',
                'created_at'        => $date
            ]);
        }
            
            
            
            $tujuan_simpan = public_path('/berkas_mhs/'.Auth::user()->nim.'_Dispensasi');
            $berkas->move($tujuan_simpan, $nama_berkas);
            
            
            return redirect('/mhsdispen')->with('alert', 'Pengajuan dispensasi anda telah berhasil di ubah! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
        
        
        
    }

    public function createyudi(Request $request){
        $date = Carbon::now();
        // $foto = $request->foto;
        $toefl = $request->toefl;
        $ijazah_sma = $request->ijazah_sma;
        $akta = $request->akta;
        $kk = $request->kk;
        $ktm = $request->ktm;
        $ktp = $request->ktp;

        // $nama_foto = $request->file('foto')->getClientOriginalName();
        $nama_toefl = $request->file('toefl')->getClientOriginalName();
        $nama_ijazah = $request->file('ijazah_sma')->getClientOriginalName();
        $nama_akta = $request->file('akta')->getClientOriginalName();
        $nama_kk = $request->file('kk')->getClientOriginalName();
        $nama_ktm = $request->file('ktm')->getClientOriginalName();
        $nama_ktp = $request->file('ktp')->getClientOriginalName();

        \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\Yudisium);

        DB::table('dokumen')->insert([
            'nim'            => $request->nim,
            'nama_mhs'       => $request->nama,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'no_ktp'         => $request->no_ktp,
            'alamat'         => $request->alamat,
            'no_telp'        => $request->no_telp,
            'email_mhs'      => $request->email,
            'semester'       => Auth::user()->semester,
            'jurusan'        => Auth::user()->jurusan,
            'fakultas'       => Auth::user()->fakultas,
            'jenis'          => 'Yudisium',
            // 'berkas_foto' => $nama_foto,
            'berkas_toefl'   => $nama_toefl,
            'berkas_ijazah'  => $nama_ijazah,
            'berkas_akta'    => $nama_akta,
            'berkas_kk'      => $nama_kk,
            'berkas_ktm'     => $nama_ktm,
            'berkas_ktp'     => $nama_ktp,
            'status'         => 'proses',
            'created_at'     => $date
        ]);
        
        $tujuan_simpan = public_path('/berkas_mhs/'.Auth::user()->nim.'_Yudisium');
        
        // $foto->move($tujuan_simpan, $nama_foto);
        $toefl->move($tujuan_simpan, $nama_toefl);
        $ijazah_sma->move($tujuan_simpan, $nama_ijazah);
        $akta->move($tujuan_simpan, $nama_akta);
        $kk->move($tujuan_simpan, $nama_kk);
        $ktm->move($tujuan_simpan, $nama_ktm);
        $ktp->move($tujuan_simpan, $nama_ktp);
        
        return redirect('/mhs')->with('alert', 'Berkas yudisium anda telah berhasil diupload! Tetap cek notifikasi untuk mengetahui kabar selanjutnya.');

        // BETA TEST CODE !!!! MASIH TESTING, KALO EROR WAJAR !!!! -Fadhli
    }

    public function eyudi(Request $request, $id){
        $date = Carbon::now();
        // $foto = $request->foto;
        $toefl = $request->toefl;
        $ijazah_sma = $request->ijazah_sma;
        $akta = $request->akta;
        $kk = $request->kk;
        $ktm = $request->ktm;
        $ktp = $request->ktp;

        // $nama_foto = $request->file('foto')->getClientOriginalName();
        $nama_toefl = $request->file('toefl')->getClientOriginalName();
        $nama_ijazah = $request->file('ijazah_sma')->getClientOriginalName();
        $nama_akta = $request->file('akta')->getClientOriginalName();
        $nama_kk = $request->file('kk')->getClientOriginalName();
        $nama_ktm = $request->file('ktm')->getClientOriginalName();
        $nama_ktp = $request->file('ktp')->getClientOriginalName();

        \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\yudisium_edit_ke_aak);

        DB::table('dokumen')->where('id', $id)->update([
            'nim'            => Auth::user()->nim,
            'nama_mhs'       => Auth::user()->nama,
            'tempat_lahir'   => Auth::user()->tempat_lahir,
            'tanggal_lahir'  => Auth::user()->tanggal_lahir,
            'no_ktp'         => Auth::user()->no_ktp,
            'alamat'         => Auth::user()->alamat,
            'no_telp'        => Auth::user()->no_telp,
            'email_mhs'      => Auth::user()->email,
            'semester'       => Auth::user()->semester,
            'jurusan'        => Auth::user()->jurusan,
            'fakultas'       => Auth::user()->fakultas,
            'jenis'          => 'Yudisium',
            // 'berkas_foto' => $nama_foto,
            'berkas_toefl'   => $nama_toefl,
            'berkas_ijazah'  => $nama_ijazah,
            'berkas_akta'    => $nama_akta,
            'berkas_kk'      => $nama_kk,
            'berkas_ktm'     => $nama_ktm,
            'berkas_ktp'     => $nama_ktp,
            'status'         => 'update ke aak',
            'created_at'     => $date
        ]);
        
       
        
        $tujuan_simpan = public_path('/berkas_mhs/'.Auth::user()->nim.'_Yudisium');
        
        // $foto->move($tujuan_simpan, $nama_foto);
        $toefl->move($tujuan_simpan, $nama_toefl);
        $ijazah_sma->move($tujuan_simpan, $nama_ijazah);
        $akta->move($tujuan_simpan, $nama_akta);
        $kk->move($tujuan_simpan, $nama_kk);
        $ktm->move($tujuan_simpan, $nama_ktm);
        $ktp->move($tujuan_simpan, $nama_ktp);
        
        return redirect('/mhsyudi')->with('alert', 'Berkas yudisium anda telah berhasil di ubah! Tetap cek notifikasi untuk mengetahui kabar selanjutnya.');
    }

    
    public function createbss(Request $request){
        $date = date(Carbon::now());
        $tanggungan = 11000000 - Auth::user()->jml_bop_dibayar;
        $tanggal_sekarang = new Carbon();
        $masuk_kuliah = new Carbon(Auth::user()->tanggal_masuk);

        $minggu_kuliah = $tanggal_sekarang->diffInWeeks($masuk_kuliah);

        echo $minggu_kuliah;

        \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\Cuti);
        
        if(Auth::user()->semester >= 3 & Auth::user()->jml_pengajuan_cuti <= 2 && $minggu_kuliah >= 4){
            DB::table('dokumen')->insert([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'jenis'             => 'Cuti',
                'status'            => 'proses',
                'created_at'            => $date,                
            ]);

            DB::table('mhs')->where('nim', '=', Auth::user()->nim)
                    ->update([
                        'jml_pengajuan_cuti' =>  Auth::user()->jml_pengajuan_cuti + 1
                ]);

            
            return redirect('/mhs')->with('alert', 'Pengajuan Cuti anda telah berhasil di upload! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
        }elseif(Auth::user()->semester < 3 & Auth::user()->jml_pengajuan_cuti <= 2 && $minggu_kuliah >= 4){
            return redirect('/mhs')->with('alert', 'Mohon maaf, Anda tidak bisa mengajukan Cuti! Anda sekarang semester'.Auth::user()->semester);
        }elseif(Auth::user()->semester >= 3 & Auth::user()->jml_pengajuan_cuti > 2 && $minggu_kuliah >= 4){
            return redirect('/mhs')->with('alert', 'Mohon maaf, Anda tidak bisa mengajukan Cuti!<br><br>Alasan : Jumlah Pengajuan cuti anda melalui batas! (Anda sudah mengajukan cuti sebanyak'.Auth::user()->jml_pengajuan_cuti.'x');
        }elseif(Auth::user()->semester >= 3 & Auth::user()->jml_pengajuan_cuti <= 2 && $minggu_kuliah < 4){
            return redirect('/mhs')->with('alert', 'Mohon maaf, Anda tidak bisa mengajukan Cuti! Alasan : Anda masih belum memasuki minggu ke 4 perkuliahan! (perkuliahan anda masih pada minggu ke : '.$minggu_kuliah);
        }else{
            return redirect('/mhs')->with('alert', 'Mohon maaf, Anda tidak bisa mengajukan Cuti! Alasan : Anda masih memiliki tanggungan keuangan sebesar Rp. '.$tanggungan);
        }
            
    }

    public function ecuti(Request $request, $id){
        $date = date(Carbon::now());

        if(DB::table('dokumen')->where('id', $id)->value('status') == 'ditolak by dosen'){
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\cuti_edit_ke_dosen);
            DB::table('dokumen')->where('id', $id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'jenis'             => 'Cuti',
                'status'            => 'update ke dosen',
                'created_at'            => $date,                
            ]);

            DB::table('mhs')->where('nim', '=', Auth::user()->nim)
                    ->update([
                        'jml_pengajuan_cuti' =>  Auth::user()->jml_pengajuan_cuti + 1
                ]);
        }else{
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\cuti_edit_ke_aak);
            DB::table('dokumen')->where('id', $id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'jenis'             => 'Cuti',
                'status'            => 'update ke aak',
                'created_at'            => $date,                
            ]);

            DB::table('mhs')->where('nim', '=', Auth::user()->nim)
                    ->update([
                        'jml_pengajuan_cuti' =>  Auth::user()->jml_pengajuan_cuti + 1
                ]);
        }

        return redirect('/mhscuti')->with('alert', 'Pengajuan Cuti anda telah berhasil di edit! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
        
    }


    public function createbst(Request $request){
        $date = date(Carbon::now());
        
        \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\BST);

        DB::table('dokumen')->insert([
            'nim'               => Auth::user()->nim,
            'nama_mhs'          => Auth::user()->nama,
            'no_telp'           => Auth::user()->no_telp,
            'email_mhs'         => Auth::user()->email,
            'semester'          => Auth::user()->semester,
            'jurusan'           => Auth::user()->jurusan,
            'fakultas'          => Auth::user()->fakultas,
            'alasan_pengajuan'  => $request->alasan,
            'jenis'             => 'BST',
            'status'            => 'proses',
            'created_at'            => $date
        ]);

        // DB::table('mhs')->update([
        //     'status_bst'        => 'proses'
        // ])->where('nim', Auth::user()->nim);
        

        return redirect('/mhs')->with('alert', 'Permohonan BST anda telah berhasil di upload! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
    }

    public function ebst(Request $request, $id){
        $date = date(Carbon::now());
        
        if(DB::table('dokumen')->where('id', $id)->value('status') == 'ditolak by dosen'){
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\bst_edit_ke_dosen);
            DB::table('dokumen')->where('id', $id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'jenis'             => 'BST',
                'status'            => 'update ke dosen',
                'created_at'            => $date
            ]);
        }else{
            \Mail::to('david.thehackedone@gmail.com')->send(new \App\Mail\bst_edit_ke_aak);
            DB::table('dokumen')->where('id', $id)->update([
                'nim'               => Auth::user()->nim,
                'nama_mhs'          => Auth::user()->nama,
                'no_telp'           => Auth::user()->no_telp,
                'email_mhs'         => Auth::user()->email,
                'semester'          => Auth::user()->semester,
                'jurusan'           => Auth::user()->jurusan,
                'fakultas'          => Auth::user()->fakultas,
                'alasan_pengajuan'  => $request->alasan,
                'jenis'             => 'BST',
                'status'            => 'update ke kaprodi',
                'created_at'            => $date
            ]);
        }
        

        return redirect('/mhsbst')->with('alert', 'Permohonan BST anda telah berhasil di edit! Harap menunggu pihak terkait untuk menyetujui pengajuan anda. Tetap cek notifikasi');
    }
    
}