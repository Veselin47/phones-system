<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name','country'];

    public function models()
    {
        return $this->hasMany(PhoneModel::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}

