<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = "departments";
    protected $guarded = [];
    protected $primaryKey = "id_departments";

    public function products() {
      return $this->hasMany(Product::class, "product_department");
    }
}

