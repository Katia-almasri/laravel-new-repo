<?php

namespace App\Rules\ChatRules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class GroupChatUniqueNameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (DB::table('chat')
            ->where('name', $value)
            ->where('first_name', $value)
            ->exists()
        )
            $fail('the group name should be unique!');
    }
}
