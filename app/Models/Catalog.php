<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image_path',
        'description',
        'start_date',
        'end_date',
    ];
}
