<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller_address extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
