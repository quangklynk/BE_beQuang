<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function category(){
        return $this->hasMany(Category::class, 'idManufacturer', 'id');
    }
}
