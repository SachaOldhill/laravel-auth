<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//un brand molte car
class Brand extends Model
{
  protected $fillable = [
    'name',
    'nationality',
  ];

  public function cars() {
      return $this -> hasMany(Car::class);
    }
}
