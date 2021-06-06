@extends('layouts.main-layout')
@section('content')
 <div class="home_container">
   <div class="mb-4">
     <h1>Edit</h1>
   </div>
   <form method="POST" action="{{ route('car-update', $car-> id)}}">

     @csrf
     @method('POST')

     <div class="form-group row">
         <label class="col-lg-4 text-lg-right" for="model"><h4>Model</h4></label>
         <div class="col-lg-6">
           <input type="text" class="form-control" id="model" name="model" value="{{ $car -> model }}" required>
         </div>
     </div>
     <div class="form-group row">
         <label class="col-lg-4 text-lg-right" for="name"><h4>Name</h4></label>
         <div class="col-lg-6">
           <input type="text" class="form-control" id="name" name="name" value="{{ $car -> name }}" required>
         </div>
     </div>
     <div class="form-group row">
         <label class="col-lg-4 text-lg-right" for="kW"><h4>kW</h4></label>
         <div class="col-lg-6">
           <input type="text" class="form-control" id="kW" name="kW" value="{{ $car -> kW }}" required>
         </div>
     </div>
      <div class="form-group row">
          <label class="col-lg-4 text-lg-right" for="brand_id"><h4>Brand</h4></label>
          <div class="col-lg-6">
            <select class="form-control" id="brand_id" name="brand_id">
              {{-- <option selected disabled>Brand</option> --}}
              @foreach ($brands as $brand)
                <option value="{{ $brand -> id }}"
                  @if ($car-> brand -> id == $brand -> id)
                    selected
                  @endif
                  >{{ $brand -> name }} ({{ $brand -> nationality }})</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-4 text-lg-right" for="pilots_id[]"><h4>Pilots</h4></label>
          <div class="col-lg-6">
            <select class="form-control" id="pilots_id[]" name="pilots_id[]" required multiple>
              @foreach ($pilots as $pilot)
                <option value="{{ $pilot -> id }}"
                  @foreach ($car -> pilots as $carPilot)
                    @if ($carPilot -> id == $pilot -> id)
                      selected
                    @endif
                  @endforeach

                  >
                  {{ $pilot -> firstname }}
                  -
                  {{ $pilot -> lastname }}
                </option>
              @endforeach
            </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
   </form>
 </div>
@endsection
