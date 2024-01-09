<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad_category_2 extends Model
{
    use HasFactory;

    protected $table = 'ad_categories_2';
    protected $fillable = ['title'];

    public function adCategory(): BelongsTo {
        return $this->belongsTo(Ad_category::class);
    }

    public function adCategories3(): HasMany {
        return $this->hasMany(Ad_category_3::class);
    }
     
}
