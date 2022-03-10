<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class dokumendispen extends Model
{
    protected $table = "dokumen";
 
    protected $fillable = ['nim','nama_mhs','email_mhs','jurusan','jenis','status','created_at'];
}