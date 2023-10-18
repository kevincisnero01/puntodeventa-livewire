<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'stock',
        'sell_price',
        'short_description',
        'long_description',
        'status',
        'category_id',
        'provider_id',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function product_status(){
        switch ($this->status) {
            case 'DRAFT':
                return 'BORRADOR';
            case 'SHOP':
                return 'TIENDA';
            case 'POS':
                return 'PUNTO DE VENTA';
            case 'BOTH':
                return 'AMBOS';
            case 'DISABLED':
                return 'DESACTIVADO';
            default:
                # code...
                break;
        }
    }


}
