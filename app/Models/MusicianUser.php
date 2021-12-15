<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicianUser extends Model
{
    protected $table = 'musician_users_tb';

    use HasFactory;

    public function genres() {
        return $this->morphMany(LikesGenre::class, 'user', 'musician');
    }

    public function __bandAssociations() {
        return $this->morphMany(HasBeenAMemberOf::class, 'MusicianMembers', 'accountMusician');
    }

    public function talents() {
        return $this->belongsToMany(Talents::class, 'has_talent', 'user_id', 'talent_id');
    }

    public function connectionsWithMessages() {
        return Connection::has('messages')->where(function ($query) {
            return $query->where('user1_id', $this->id)->orWhere('user2_id', $this->id);
        });
    }

    public function connectionsWithoutMessages() {
        return Connection::doesntHave('messages')->where(function ($query) {
            return $query->where('user1_id', $this->id)->orWhere('user2_id', $this->id);
        });
    }

    public function currentBandAssociations() {
        return $this->__bandAssociations()->whereNull(['endMonth', 'endYear']);
    }

    public function previousBandAssociations() {
        return $this->__bandAssociations()->whereNUll(['endMonth', 'endYear'], 'and', true);
    }
}
