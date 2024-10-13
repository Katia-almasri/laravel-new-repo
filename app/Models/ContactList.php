<?php

namespace App\Models;

use App\Enums\ContactListsEnum\ContactListType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactList extends BaseModel
{
    use HasFactory;
    protected $table = 'contact_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'has_account',  // has account on whats app
        'owner_phone_number'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'has_account' => ContactListType::class,
    ];

    ############# RELATIONS ##################
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_phone_number', 'phone_number');
    }

    public function userAccount()
    {
        return $this->belongsTo(User::class, 'phone_number', 'phone_number');
    }
}
