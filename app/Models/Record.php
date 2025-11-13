<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
   use HasFactory;

    // Table name (optional if your table name follows Laravel's plural naming)
    protected $table = 'records';

    // Fields that can be mass assigned
    protected $fillable = [
        'FullName',
        'BusinessName',
        'Email',
        'PhoneNumber',
        'File',
        'message',
    ];
}
