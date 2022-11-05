<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = ['id', 'statuses'];

    public $timestamps = false;

    public function artikel()
    {
        return $this->hasMany(Artikelstatus::class, 'id_status', 'id');
    }
}
