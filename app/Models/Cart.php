<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductID',
        'Quantity',
    ];

    public $timestamps = false;
    protected $primaryKey = 'ProductID';
}
