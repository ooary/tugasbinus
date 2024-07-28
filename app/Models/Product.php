<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'margin', 'sales_price',
    ];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
   

    public function calculateSalesPrice()
    {
        $this->sales_price = $this->price + ($this->price * ($this->margin / 100));
        $this->save();
    }
    
    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->calculateSalesPrice();
    //     });
    // }
}
