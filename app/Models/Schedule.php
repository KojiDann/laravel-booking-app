<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'day',
        'start',
        'end',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
