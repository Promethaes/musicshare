<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file_path'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo((User::class));
    }
}
