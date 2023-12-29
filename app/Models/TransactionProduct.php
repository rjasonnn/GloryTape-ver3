<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_transaction';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price',
    ];
}
