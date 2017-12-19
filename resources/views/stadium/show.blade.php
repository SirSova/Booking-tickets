@extends('app')

@section('content')
    <div class="container">
        <ul class="list-unstyled">
            @foreach($sectors as $sector)
                <li class="col-sm-3 text-center sector">
                    <a href="{{ route('sector', $sector->id) }}"> {{ $sector->name }}</a>
                    <p>Numbers of free places : {{ $sector->freePlaces() }}</p>
                    <p>Average price on place : {{ $sector->averagePrice() }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection