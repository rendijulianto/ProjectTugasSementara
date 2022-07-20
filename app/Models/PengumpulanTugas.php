<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tugas';
    protected $table = 'pengumpulan_tugas';
    protected $fillable = ['id_tugas', 'id_siswa'];
    public $timestamps = false;

    public function tugas()
    {
        return $this->belongsTo('App\Models\Tugas', 'id_tugas');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }
}
