<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // table name
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected    $hidden = [
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
    ];

    #################### RELATIONS ############################
    public function chats()
    {
        return $this->belongstoMany(Chat::class, 'chats', 'user_id', 'chat_id');
    }

    public function owner()
    {
        return $this->hasMany(Chat::class, 'owner_id');
    }

    public function messages()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function contactLists()
    {
        return $this->hasMany(ContactList::class, 'owner_phone_number', 'phone_number');
    }

    public function contactList()
    {
        return $this->belongsTo(ContactList::class, 'phone_number', 'phone_number');
    }
}
