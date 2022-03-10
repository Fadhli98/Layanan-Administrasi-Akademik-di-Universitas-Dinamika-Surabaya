<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class dokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/*
        DB::table('dokumen')->insert([
        	'nim' => '17410100039',
        	'nama_mhs' => 'aditya martin',
        	'email_mhs' => '17410100039@dinamika.ac.id',
        	'semester' => '8',
        	'angkatan' => '2017',
        	'jurusan' => 'Sistem informasi',
        	'jenis' => 'Cuti',
        	'file' => '17410100039_cuti.pdf',
        	'batas_cuti' => '1',
        ]);
        $faker = Faker::create('id_ID');
 
    	for($i = 29; $i <= 45; $i++){
 
    	      // insert data ke table dokumen menggunakan Faker
    		DB::table('dokumen')->insert([
    			'nim' => $faker->numerify($string = '###'),
    			'nama_mhs' => $faker->name,
    			'email_mhs' => $faker->safeEmail,
                'semester' =>  $faker->numberBetween(3,8),
        	    'angkatan' =>  $faker->numberBetween(2016,2021),
        	    'jurusan' => $faker->randomElement(['S1 Sistem Informasi',
                'S1 Sistem Komputer','D3 Sistem Informasi','S1 Akutansi','S1 Desain Komunikasi Visual',
                'S1 Desain Produk','S1 Produksi Film Dan Telivisi']),
        	    'jenis' => $faker->randomElement(['Cuti','Yudisium','Dispensasi','BST']),
        	    'file' =>  $faker->fileExtension('pdf'),
            	'batas_cuti' => $faker->numberBetween(0,2),
				'status'=>'selesai',
            	'created_at' => $faker->dateTimeBetween('2020-04-01', '2020-07-30'),

    		]);
        }*/
		$faker = Faker::create('id_ID');
		for($i = 3; $i <= 26; $i++){
 
			// insert data ke table dokumen menggunakan Faker
		  DB::table('mhs')->insert([
			  'nim' => $faker->numerify($string = '###'),
			  'nama' => $faker->name,
			  'email' => $faker->safeEmail,
			  'angkatan' =>  $faker->numberBetween(2016,2017),
			  'jurusan' => $faker->randomElement(['S1 Sistem Informasi',
			  'S1 Teknik Komputer','D3 Sistem Informasi','S1 Akuntansi','S1 Desain Komunikasi Visual',
			  'S1 Desain Produk','S1 Produksi Film Dan Telivisi']),
			  'ket_yud'=>'T',
			  'tempat_lahir'=>'Surabaya',
			  'tanggal_lahir'=> $faker->dateTimeBetween('1997-01-01', '2000-12-30'),
			  'no_telp'=>$faker->numerify($string = '########'),
			  'password'=>$faker->numerify($string = '###'),
			  'alamat'=>'Jl.',
			  'semester' =>  $faker->numberBetween(6,9),
			  
			  'fakultas'=>'Teknik dan Informatika',
			  'status'=>'aktif',
			  'created_at' => $faker->dateTimeBetween('2016-01-01', '2017-12-30'),

		  ]);
	  }
    }
}
