<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    //
    protected $guarded = [];
    //
    public function department() {
      return $this->belongsTo(Department::class, "product_department");
    }
}
