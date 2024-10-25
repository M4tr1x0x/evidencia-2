<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number', 'status', 'user_id', 'process_name', 'process_date', 'evidence_photo'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
