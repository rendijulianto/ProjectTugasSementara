<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kurikulum';
    protected $table = 'kurikulum';
    protected $fillable = ['id_kurikulum', 'nama', 'id_admin'];
    public $timestamps = false;

    public function scopeSearch($query, $search='') {
        if ($search != '') {
            return $query->where('nama', 'like', '%'.$search.'%');  
        }
    }

    public function mataPelajaran()
    {
        return $this->hasMany('App\Models\MataPelajaran', 'id_kurikulum');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'id_admin');
    }
    


}
