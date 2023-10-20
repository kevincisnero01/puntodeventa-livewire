<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ci',
        'rif',
        'address',
        'phone',
        'email',
    ];

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    public function isNatural()
    {
        return !empty($this->ci);
    }

    public function isJuridico()
    {
        return !empty($this->rif);
    }

}
