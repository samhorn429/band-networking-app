<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BandUser extends Model
{
    protected $table = 'band_users';

    use HasFactory;

    public function searchingFor() {
        return $this->belongsToMany(Talents::class, 'searching_for', 'user_id', 'role_id');
    }

    public function genres() {
        return $this->morphMany(LikesGenre::class, 'user', 'musician');
    }

    public function memberAssociations() {
        return $this->morphMany(HasBeenAMemberOf::class, 'BandMembers', 'accountBand');
    }
}
