<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $table = 'connections_table';

    use HasFactory;

    public function messages() {
        return $this->hasMany(Message::class, "conn_id", "id")
            ->orderBy('timestamp', 'asc');
    }

    public function userOne() {
        return $this->belongsTo(MusicianUser::class, "user1_id", "id");
    }

    public function userTwo() {
        return $this->belongsTo(MusicianUser::class, "user2_id", "id");
    }

    public function scopeOrderByTimestamp($query) {
        return $query->orderByDesc('timestamp');
    }

    public function scopeFilter($query, array $filters) {
        return $query->when($filters['search'] ?? null, function($query, $search) {
            $query->whereHas('userOne', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->orWhereHas('userTwo', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
        });
    }
}
