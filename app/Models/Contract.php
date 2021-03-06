<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'contract_id');
    }

    public function pluckNameForItems()
    {
        return $this->items->pluck("name")->implode(' , ');
    }
}
