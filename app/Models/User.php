<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Traits\LockableTrait;
use App\Models\Projet;
use App\Models\Conversation;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use LockableTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'phone_number',
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
  
   /* public function modules()
    {
        return $this->hasManyThrough(Module::class, Projet::class);
    }*/

    public function conversations()
    {
        return Conversation::where(function ($q) {
            $q->where('to', $this->id)
                ->orWhere('from', $this->id);
        });
    }
 

    public function getConversationsAttribute()
    {
        return $this->conversations()->get();
    }
}
