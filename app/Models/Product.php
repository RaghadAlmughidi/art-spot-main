<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable =[
        'product_name',
        'product_desc',
        'product_width' ,
        'product_hight',
        'product_price',
        'product_image',
        'artist_name',
        'artist_image',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }
}
