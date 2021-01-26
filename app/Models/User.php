<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded= ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'expired_at'=> 'datetime'
    ];

    public function information()
    {
        return $this->hasOne(Information::class, 'user_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'user_id');
    }

    public function contractpoints()
    {
        return $this->hasMany(ContractPoint::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    public function structures()
    {
        return $this->hasMany(Structure::class, 'user_id');
    }
}
