<?php

namespace App\Helper;

use Illuminate\Support\Str;

class StringConvertorHelper
{
    public static function convertToSnakeSingleName(string $name): string
    {
        if ($name != null) {
            return str_replace('\\', '', Str::snake(Str::singular($name)));
        }
        return '';
    }


}
