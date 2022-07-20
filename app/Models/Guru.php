<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Guru extends Model implements Authenticatable
{ 
    use HasFactory;
    use AuthenticableTrait;
    protected $primaryKey = 'id_guru';
    protected $table = 'guru';
    protected $fillable = ['id_guru','username', 'password','nama','id_admin', 'alamat', 'nama', 'nip'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'id_admin');
    }

    public function mataPelajaranKelas()
    {
        return $this->hasMany('App\Models\MataPelajaranKelas', 'id_guru');
    }



    public function scopeSearch($query, $search='') {
        if ($search != '') {
            return $query->where('nama', 'like', '%'.$search.'%')
            ->orWhere('nip', 'like', '%'.$search.'%')
            ->orWhere('username', 'like', '%'.$search.'%')
            ->orWhere('alamat', 'like', '%'.$search.'%');
        }
    }

}
