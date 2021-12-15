<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasBeenAMemberOf extends Model
{
    protected $table = 'hasbeenamember_of';

    use HasFactory;


    public function musicianMember() {
        return $this->morphTo('MusicianMembers', 'memberType', 'musician_id');
    }

    public function bandMember() {
        return $this->morphTo('BandMembers', 'memberType', 'band_id');
    }

    public function memberRoles() {
        return $this->belongsToMany(Talents::class, 'member_roles', 'mem_id', 'role_id');
    }
}
