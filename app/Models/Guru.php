<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_guru';
    protected $table = 'guru';
    protected $fillable = ['id_guru','username', 'password','nama','id_admin', 'alamat', 'nama', 'nip'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'id_admin');
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
