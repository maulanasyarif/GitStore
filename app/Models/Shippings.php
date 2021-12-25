<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippings extends Model
{
    use HasFactory;

    protected $table = 'shippings';
    protected $guarded = [];

    // public function Products()
    // {
    //     return $this->hasMany(Products::class, 'discount_id');
    // }
}