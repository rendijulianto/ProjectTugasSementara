<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaranGuru extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mapel';
    protected $table = 'mata_pelajaran_guru';
    protected $fillable = [ 'id_mapel', 'id_guru'];
    public $timestamps = false;

    public function mapel()
    {
        return $this->belongsTo('App\Models\MataPelajaran', 'id_mapel');
    }

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'id_guru');
    }
}
