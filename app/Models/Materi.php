<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_materi';
    protected $table = 'materi';
    protected $fillable = ['id_materi', 'id_jadwal', 'judul', 'konten','tanggal_buat','tanggal_tutup'];
    public $timestamps = false;

    public function jadwal()
    {
        return $this->belongsTo('App\Models\MataPelajaranKelas', 'id_jadwal');
    }
    

}
