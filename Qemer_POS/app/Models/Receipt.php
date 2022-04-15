<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'receipt_number',
        'tin_number'
    ];
    protected $dateFormat = 'Y-m-d';
}
