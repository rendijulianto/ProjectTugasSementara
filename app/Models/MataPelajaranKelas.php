<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaranKelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jadwal';
    protected $table = 'mata_pelajaran_kelas';
    protected $fillable = ['id_jadwal', 'id_mapel', 'id_guru', 'id_kelas'];
    public $timestamps = false;

    public function mapel()
    {
        return $this->belongsTo('App\Models\MataPelajaran', 'id_mapel');
    }

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'id_guru');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
