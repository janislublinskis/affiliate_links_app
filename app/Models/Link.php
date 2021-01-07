<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $guarded = [];

    public static function uuid(string $uuid): ?Link
    {
        return static::where('uuid', $uuid)->first();
    }
}
