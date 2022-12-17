<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;
    protected $fillable = ['name','harga','gambar','ac','ukuran','kamarmandi','parkir','wifi'];
}
