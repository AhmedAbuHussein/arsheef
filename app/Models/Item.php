<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
