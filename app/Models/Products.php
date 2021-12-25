<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];

    public function Carts()
    {
        return $this->hasOne(Carts::class, 'id');
    }
    
    public function Transactions()
    {
        return $this->hasMany(Transactions::class, 'product_id');
    }
}