<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Notifikasi extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'notifikasi';
    protected $guard_name = 'web';

    protected $guard = ['id'];

    public function user()

    {
        return $this->belongsTo(User::class, 'id_point', 'id');
    }
}
