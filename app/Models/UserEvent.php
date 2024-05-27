<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEvent extends Model
{
    use HasFactory;
    protected $primaryKey = ['users_id', 'events_id'];

    public $incrementing = false;
    protected $keyType = 'array';


    protected $casts = [
        'users_id' => 'integer',
        'events_id' => 'integer',
    ];

    public function events()
    {
        return $this->belongsTo(Event::class, 'events_id', 'id');
    }
}
