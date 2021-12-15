<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAccountBands extends Model
{
    protected $table = 'no_AccountBands';
    
    use HasFactory;

    public function memberAssociation() {
        return $this->morphOne(HasBeenAMemberOf::class, 'BandMembers', 'noAccBand');
    }

    public function genres() {
        return $this->hasMany(NoAccountBandGenre::class, 'noAccBand_id');
    }
}
