<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';
    protected $fillable = ['id', 'name', 'harga', 'gambar', 'ac', 'ukuran', 'kamarmandi', 'parkir', 'wifi'];
}
