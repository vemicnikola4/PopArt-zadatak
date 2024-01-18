<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;
    public function custumer(): BelongsTo
    {
        return $this->belongsTo(Custumer::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
