<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $primaryKey = 'id_admin';
    protected $table = 'admin';
    protected $fillable = ['id_admin','username', 'password'];
    protected $hidden = ['password'];
    public $timestamps = false;
}
