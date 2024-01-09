<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad_category extends Model
{
    use HasFactory;

    protected $table = 'ad_categories';
    protected $fillable = ['title'];

    public function adCategories2(): HasMany {
        //ovo je query bilder i mozemo da ga sirimo i where uslovima itd
        return $this->hasMany(Ad_category_2::class);
    }
}
