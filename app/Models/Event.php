<?php

namespace App\Models;

use App\Models\EventType;
use App\Models\EventDetail;
use App\Models\EventOrganizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    public function event_details()
    {
        return $this->hasOne(EventDetail::class);
    }

    public function event_types()
    {
        return $this->belongsTo(EventType::class, 'eventType_id', 'id');
    }

    public function event_organizers()
    {
        return $this->belongsTo(EventOrganizer::class, 'organizer_id', 'id');
    }
}
