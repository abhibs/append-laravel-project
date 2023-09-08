<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function socialmedia()
    {
        return $this->hasMany(SocialMedia::class, 'team_id', 'id');
    }
}
