<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Cart extends Model
{
    use HasFactory;
    // use HasCompositeKey;
    // protected $primaryKey = ['id', 'events_id'];
    // public $incrementing = false;
    // protected $keyType = 'array';

    // protected $casts = [
    //     'id' => 'integer',
    //     'events_id' => 'integer',
    // ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_carts', 'carts_id', 'events_id')->withTimestamps();
    }
}
