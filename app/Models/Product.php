<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'productid'; // កំណត់ Primary Key

    protected $fillable = [
        'productname',
        'price',
        'quantity',
        'description',
        'catid',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'catid', 'categoryid');
    }
}