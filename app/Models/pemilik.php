<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class pemilik extends Model
{
    use HasFactory;
    protected $fillable  = [
        'pemilik_name',
        'tempat_lahir'
    ];
    public function phone(): HasMany
    {
        return $this->HasMany(pemilik::class);
    }
}
