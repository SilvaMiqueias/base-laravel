<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\This;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
