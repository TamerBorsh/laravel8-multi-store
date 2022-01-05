<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Seller extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guarded = [];
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
   
    public function getUserNameAttribute(){
        return $this->first_name;
    }

    public function getStateAttribute(){
        return $this->status ? 'Active' : 'Inactive';
    }

    public function addresses(){
        return $this->hasMany(Seller_address::class);
    }
    
    
}
