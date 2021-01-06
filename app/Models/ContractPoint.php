<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractPoint extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'date'=> 'datetime',
        "start_date"=> "datetime",
        "other"=> "array",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
