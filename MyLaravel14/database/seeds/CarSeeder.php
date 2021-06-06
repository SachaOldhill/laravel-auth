<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Brand;
use App\Pilot;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { //se c'è la chiave esterna va usata la make
      factory(Car::class, 50) -> make()
      ->each(function($car){

        $brand = Brand::inRandomOrder() -> first();
        $car -> brand() -> associate($brand);
        $pilots= Pilot::inRandomOrder()
                    -> limit(10)
                    -> get();
        $car -> pilots() -> attach($pilots);
        $car -> save();
      });
    }
}
