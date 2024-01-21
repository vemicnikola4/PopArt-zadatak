<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ad extends Model
{
    use HasFactory;
    public function custumer(): BelongsTo
    {
        return $this->belongsTo(Custumer::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }
    // public function adCategory2(): BelongsTo {
    //     return $this->belongsTo(Ad_category_2::class);
    // }
    
    public function adCategory(): BelongsTo {
        return $this->belongsTo(Ad_category::class);
    }
    
    // public function adCategory3(): BelongsTo {
    //     return $this->belongsTo(Ad_category_3::class);
    // }
}
