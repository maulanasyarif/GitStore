<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;

    protected $table = 'discounts';
    protected $guarded = [];

    public function Products()
    {
        return $this->hasMany(Products::class, 'discount_id');
    }
}