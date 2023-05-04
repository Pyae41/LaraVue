<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'item_name',
        'price',
        'description',
        'item_condition',
        'item_type',
        'item_photo',
        'location',
        'owner_name',
        'contact_number',
        'address',
        'status',
    ];

    public function category(){
        return $this->belongTo(Category::class);
    }
}
