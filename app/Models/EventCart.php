<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCart extends Model
{
    use HasFactory;
    protected $table = 'events_carts';
    protected $primaryKey = ['events_id', 'carts_id'];
    public $incrementing = false;
    protected $keyType = 'array';


    protected $casts = [
        'events_id' => 'integer',
        'carts_id' => 'integer',
    ];
    
}
