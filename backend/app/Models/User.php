<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];




     public function getUserData()
    {
        return [

            'name'=> $this->name,
            'email'=> $this->email,
            'user_id' => $this->id,
            'is_admin'=> $this->is_admin,




        ];
    }
    /**
     * Check User IS Admin
     * @return bool
     */
    public function isAdmin()
    {
        if ((int)$this->is_admin == 1){
            return true;
        }
        return false;
    }

    /**
     * Set User To Admin
     */
    public  function setAdmin(){
        $this->is_admin = 1;
        $this->save();

    }


}
