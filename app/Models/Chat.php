<?php

namespace App\Models;

use App\Enums\ChatsEnum\ChatType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends BaseModel
{
    use HasFactory;

    // table name
    protected $table = 'chat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_group',
        'owner_id',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_group' => ChatType::class,
    ];


    #################### RELATIONS ############################
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_user', 'chat_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    ################### CCESSORS & MUTATORS ###################

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->first_name . ' ' . $this->last_name
        );
    }
}
