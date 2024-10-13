<?php

namespace Database\Seeders;

use App\Models\ContactList;
use Illuminate\Database\Seeder;

class ContactListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactList::factory()->count(50)->create();
    }
}
