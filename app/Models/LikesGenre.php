<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesGenre extends Model
{
    protected $table = 'likesgenre';

    use HasFactory;

    public function user() {
        return $this->morphTo('user', 'userType', 'user_id', 'id');
    }
}
