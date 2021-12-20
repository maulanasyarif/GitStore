<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];

    public function Discounts()
    {
        return $this->belongsTo(Discounts::class, 'discount');
    }
}