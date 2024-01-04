<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ProdukListItem(): HasMany
    {
        return $this->hasMany(ProdukListItem::class, 'id_produk', 'id');
    }

    // public function Room(): HasMany
    // {
    //     return $this->hasMany(Room::class, 'id_room_type', 'id');
    // }
}
