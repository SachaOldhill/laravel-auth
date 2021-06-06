<?php

namespace App\Http\Controllers;
use App\Car;
use App\Pilot;
use App\Brand;
use Illuminate\Http\Request;

class MainController extends Controller
{
  private function getValidationRules(){
    return [
      'name' => 'required|string|min:2|max:255',
      'model' => 'required|string|min:2|max:255',
      'kW' => 'required|integer|min:0|max:100',
    ];
  }
  public function freehome() {
    return view('pages.home');
  }
  public function car() {
    // $cars = Car::all();
    $cars = Car::where('deleted', false) -> get();
    return view('pages.home', compact(
      'cars'
    ));
  }
  // public function pilot($id) {
  //   $pilot = Pilot::findOrFail($id);
  //   return view('pages.pilot', compact(
  //       'pilot'
  //   ));
  // }
  // public function createCar(){
  //   $pilots = Pilot::all();
  //   $brands = Brand::all();
  //   return view('pages.new-car', compact(
  //     'brands',
  //     'pilots'
  //   ));
  // }
  //
  // public function storeCar(Request $request){
  //
  //   $validate = $request -> validate($this -> getValidationRules());
  //   $brand = Brand::findOrFail($request -> get('brand_id'));
  //   $car = Car::make($validate);
  //   $car -> brand() -> associate($brand);
  //   $car -> save();
  //   $car -> pilots() -> attach($request -> get('pilots_id'));
  //   $car -> save();
  //   // return redirect() -> route('home');
  //   return redirect() -> route('home', $car -> id);
  // }
}
