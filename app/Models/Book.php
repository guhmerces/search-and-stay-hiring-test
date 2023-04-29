<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isbn',
        'value',
    ];

    /**
     * Prepare the value(book's price) attribute to be stored as integer and retrieved as a string
     */
    protected function value(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => number_format($value/100, 2),
            set: fn (string $value) => preg_replace("/[^0-9]/", "", $value), // Retain only numbers
        );
    }
}
