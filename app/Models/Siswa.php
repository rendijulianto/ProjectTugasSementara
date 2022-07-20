<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siswa';
    protected $table = 'siswa';
    protected $fillable = ['id_siswa','nama', 'nis', 'password','nama','id_admin', 'jenis_kelamin'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'id_admin');
    }

    public function kelasSiswa()
    {
        return $this->hasOne('App\Models\KelasSiswa', 'id_siswa');
    }


    public function pengumpulan()
    {
        return $this->hasMany('App\Models\PengumpulanTugas', 'id_siswa');
    }

  
    public function scopeSearch($query, $search='') {
        if ($search != '') {
            return $query->where('nama', 'like', '%'.$search.'%')
            ->orWhere('nis', 'like', '%'.$search.'%')
            ->orWhere('jenis_kelamin', 'like', '%'.$search.'%');
        }
    }
    
    public function scopeJenisKelamin($query, $jenis_kelamin='') {
        if($jenis_kelamin != '') {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        }
    }


}
