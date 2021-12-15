<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAccountMembers extends Model
{
    protected $table = 'no_AccountMembers';

    use HasFactory;

    public function bandAssociation() {
        return $this->morphOne(HasBeenAMemberOf::class, 'MusicianMembers', 'noAccMusician');
    }
}
