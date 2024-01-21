<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad_category_3 extends Model
{
    use HasFactory;

    protected $table = 'ad_categories_3';
    protected $fillable = ['title'];

    public function adCategory2(): BelongsTo {
        return $this->belongsTo(Ad_category_2::class);
    }
    public function ads(): HasMany {
        //ovo je query bilder i mozemo da ga sirimo i where uslovima itd
        return $this->hasMany(Ad::class);
    }
}
