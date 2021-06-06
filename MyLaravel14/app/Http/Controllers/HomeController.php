<?php

namespace App\Http\Controllers;
use App\Car;
use App\Pilot;
use App\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
      return view('home');
    }
    public function loggedPage() {
      return view('pages.loggedin');
    }
    public function edit($id){
      $car = Car::findOrFail($id);
      $brands = Brand::all();
      $pilots=Pilot::all();
      return view('pages.edit-car', compact(
        'car',
        'brands',
        'pilots'
      ));
    }
    public function update(Request $request, $id){
      $validate = $request -> validate($this -> getValidationRules());
      $car = Car::findOrFail($id);
      $car -> update($validate);

      $car -> brand() -> associate($request -> brand_id);
      $car -> save();
      //se uso attach aggiungo solo, la sync fa deattach su tutto e aggiunge solo i selezionati
      $car -> pilots() -> sync($request -> pilots_id);

      return redirect() -> route('car');
    }
    public function delete($id){
    $car = Car::findOrFail($id);
    $car -> deleted = true;
    $car -> save();
    return redirect() -> route('car');
  }
}
