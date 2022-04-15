<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
        'rno',
        'tno'
    ];

    public function item() {
        return $this->belongsTo(Stock::class,'stock_id');

    }
        protected $dateFormat = 'Y-m-d';

}
