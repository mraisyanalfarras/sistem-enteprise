<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emlpoyee extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'place of birth',
        'dob',
        'religion',
        'sex',
        'phone',
        'salary',
    ];
}
