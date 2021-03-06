<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        "bank_accounts"=> "array",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
