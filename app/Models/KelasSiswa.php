<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasFactory;
    protected $table = 'kelas_siswa';
    protected $fillable = [ 'id_kelas', 'id_siswa'];
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }
    
}
