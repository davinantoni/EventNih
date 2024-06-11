<?php

namespace App\Models;

use App\Models\Event;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    public function header()
    {
        return $this->belongsTo(TransactionHeader::class, 'transactionHeaders_Id', 'id');
    }

    // public function events()
    // {
    //     return $this->belongsTo(Event::class, 'events_id', 'id');
    // }
}
