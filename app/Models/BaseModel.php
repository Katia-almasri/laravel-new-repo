<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * THIS MODEL IS THE PARENT OF ALL MODELS IN THE SYSTEM
 * THAT SHARE THE SAME CONVENTION
 */
class BaseModel extends Model
{
    use HasFactory;

    public function getTable()
    {
        if (!isset($this->table)) {
            return str_replace(
                '\\', '', Str::snake(Str::singular(class_basename($this)))
            );
        }
        return $this->table;
    }
}
