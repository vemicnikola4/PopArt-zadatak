<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Custumer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name','location','phone_number'];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }

    
}
