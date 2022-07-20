<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mapel';
    protected $table = 'mata_pelajaran';
    protected $fillable = ['id_mapel', 'nama', 'id_kurikulum'];

    public $timestamps = false;


    public function scopeSearch($query, $search='') {
        if ($search != '') {
            return $query->where('nama', 'like', '%'.$search.'%')
            ->orWhere('id_mapel', 'like', '%'.$search.'%')
            ->orWhere('id_kurikulum', 'like', '%'.$search.'%');
        }
    }

    public function scopeKurikulum($query, $kurikulum='') {
        if($kurikulum != '') {
            return $query->where('id_kurikulum', $kurikulum);
        }
    }

    public function kurikulum()
    {
        return $this->belongsTo('App\Models\Kurikulum', 'id_kurikulum');
    }

    public function guru()
    {
        return $this->hasMany('App\Models\MataPelajaranGuru', 'id_mapel');
    }

}
