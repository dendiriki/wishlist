<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Point extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'points';
    protected $guard_name = 'web';

    protected $fillable = ['id','id_user', 'jumlah_point', 'nama_user'];

    public function user()

    {
        return $this->belongsTo(User::class, 'id_point', 'id');
    }
}
