<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commant extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function child()
    {
        return $this->hasMany(Commant::class, 'parent_id');
    }

}
