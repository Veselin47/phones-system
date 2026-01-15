<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['name','phone_model_id','manufacturer_id','release_year','image'];

    public function model()
    {
        return $this->belongsTo(PhoneModel::class, 'phone_model_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}

