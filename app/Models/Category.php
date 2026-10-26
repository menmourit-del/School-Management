<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoryid'; // កំណត់ Primary Key


    protected $fillable = [
        'categoryname',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'catid', 'categoryid');
    }
}