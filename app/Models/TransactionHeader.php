<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionHeader extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactionHeaders_Id', 'id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'transaction_details', 'transactionHeaders_Id', 'events_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
