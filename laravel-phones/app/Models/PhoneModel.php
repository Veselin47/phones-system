<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    protected $fillable = ['name','manufacturer_id'];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}

