<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable {
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }
}
