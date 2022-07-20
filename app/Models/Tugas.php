<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    use HasFactory;
    protected $primaryKey = 'id_tugas';
    protected $table = 'tugas';
    protected $fillable = ['id_tugas', 'id_jadwal', 'judul', 'konten','tanggal_buat','tanggal_tutup'];
    public $timestamps = false;

    public function jadwal()
    {
        return $this->belongsTo('App\Models\MataPelajaranKelas', 'id_jadwal');
    }
    
    // pengumpulan 
    public function pengumpulan()
    {
        return $this->hasMany('App\Models\PengumpulanTugas', 'id_tugas');
    }

}
