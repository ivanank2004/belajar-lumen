<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'id_kategori',
        'menu',
        'gambar',
        'harga'
    ];
}
