<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    use HasFactory;

    public function connection() {
        return $this->belongsTo(Connection::class, 'conn_id', 'conn_id');
    }
}
