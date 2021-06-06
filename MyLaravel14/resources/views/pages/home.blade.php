@extends('layouts.main-layout')
@section('content')
    <div class="my_home">
      <h2>Home per tutti</h2>
      <h1>Cars:</h1>
      <ul>
        @foreach ($cars as $car)
          <li class='my_li'>
            <h3>Car:</h3>
             {{ $car -> name }}
             -
             {{ $car -> model }}
             : kW
             {{ $car -> kW }}
             <a class="edit_button"href="{{ route('car-edit', $car -> id) }}">
              &#9998;
            </a>
            <a href="{{ route('delete', $car -> id) }}">
              &#10060;
            </a>
             <br>
             <h3>
               Brand ->
               <strong>{{ $car -> brand -> name }}</strong>
             </h3>
           @foreach ($car -> pilots as $pilot)
             <li class="">
               <span>Pilot:</span>
               {{-- <a href="{{ route('pilot', $pilot -> id) }}"> --}}
                 {{ $pilot -> firstname }}
                 -
                 {{ $pilot -> lastname }},
               {{-- </a> --}}
                 nationality:
                 {{ $pilot -> nationality }}
                 <br>
                 {{ $pilot -> data_of_birthday }}
             </li>
           @endforeach
          </li>
        @endforeach
    </ul>
    </div>
@endsection
