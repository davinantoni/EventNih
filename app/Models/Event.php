<?php

namespace App\Models;

use App\Models\User;
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_events', 'events_id', 'users_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'events_carts', 'events_id', 'carts_id')->withTimestamps();
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'events_id', 'id');
    }

    public function transaction_headers()
    {
        return $this->belongsToMany(TransactionHeader::class, 'transaction_details', 'events_id', 'transactionHeaders_Id')->withTimestamps();
    }

}
