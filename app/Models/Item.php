<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ProdukListItem(): HasMany
    {
        return $this->hasMany(ProdukListItem::class, 'id_item', 'id');
    }
}
