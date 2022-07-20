<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelas';
    protected $table = 'kelas';
    protected $fillable = ['id_kelas','nama', 'tahun_ajaran', 'jurusan'];
    public $timestamps = false;


    public function scopeSearch($query, $search='') {
        if ($search != '') {
            return $query->where('nama', 'like', '%'.$search.'%')
            ->orWhere('nama', 'like', '%'.$search.'%')
            ->orWhere('tahun_ajaran', 'like', '%'.$search.'%')
            ->orWhere('jurusan', 'like', '%'.$search.'%');
        }
    }

    public function scopeTahunAjaran($query, $tahun_ajaran='') {
        if($tahun_ajaran != '') {
            return $query->where('tahun_ajaran', $tahun_ajaran);
        }
    }

    public function scopeJurusan($query, $jurusan='') {
        if($jurusan != '') {
            return $query->where('jurusan', $jurusan);
        }
    }

    public function mataPelajaran()
    {
        return $this->hasMany('App\Models\MataPelajaranKelas', 'id_kelas');
    }
    

}
