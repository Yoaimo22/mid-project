<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Phone extends Model
{
    use HasFactory;
    protected $table = 'phone';
    protected $fillable  = [
        'phone_name',
        'pemilik_id',
        'phone_image_path'
    ];
    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(pemilik::class);
    }
}
