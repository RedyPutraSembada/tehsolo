<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukListItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_item', 'id');
    }

    public function Produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
