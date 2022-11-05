<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    use HasFactory;

    protected $table = 'headline';

    protected $fillable = ['highlight'];

    public $timestamps = false;

    public function artikelheadline()
    {
        return $this->hasMany(Artikelheadline::class, 'id_headline', 'id');
    }
}
