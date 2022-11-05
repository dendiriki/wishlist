<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Riwayatpoin extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'riwayat_poin';
    protected $guard_name = 'web';

    protected $fillable = ['id','nama_user','id_point' ,'jumlah_point', 'keterangan'];

    public function user()

    {
        return $this->belongsTo(User::class, 'id_point', 'id');
    }
}
