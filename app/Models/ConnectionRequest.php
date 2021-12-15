<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionRequest extends Model
{
    protected $table = 'connectionRequests';

    use HasFactory;

    public function sender() {
        return $this->belongsTo(MusicianUser::class, 'sender_id', 'id');
    }

    public function receiver() {
        return $this->belongsTo(MusicianUser::class, 'receiver_id', 'id');
    }
}
