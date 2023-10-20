<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'customer_id',
        'purchase_date',
        'tax',
        'total',
        'status',
        'picture',
    ];

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    
    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }

}
