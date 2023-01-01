<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;

class Leaderboard extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'leaderboards';
    protected $guard_name = 'web';

    protected $fillable = ['id','user_id','rank' ,'badge'];

    public function user()

    {
        return $this->belongsTo(User::class);
    }
}
