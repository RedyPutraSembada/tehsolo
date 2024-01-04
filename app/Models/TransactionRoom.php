<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionRoom extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'id_guest', 'id');
    }

    public function PriceRateType(): BelongsTo
    {
        return $this->belongsTo(PriceRateType::class, 'id_price_rate_type', 'id');
    }

    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'id_room', 'id');
    }

    public function TravelAgent(): BelongsTo
    {
        return $this->belongsTo(TravelAgent::class, 'id_travel_agent', 'id');
    }

    public function SourceTravelAgent(): BelongsTo
    {
        return $this->belongsTo(SourceTravelAgent::class, 'id_source_travel_agent', 'id');
    }
}
