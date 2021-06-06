<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//molte car molti piloti
//molte car 1 Brand
class Car extends Model
{
  protected $fillable = [
    'name',
    'model',
    'kW',
    'brand_id',
  ];
  public function pilots() {
      return $this -> belongsToMany(Pilot::class);
    }

  public function brand() {
      return $this -> belongsTo(Brand::class);
    }
}
