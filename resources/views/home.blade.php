@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            @if(Auth::guest())
                Please sign in to the account and then you will have the opportunity to create stadiums or book places
            @else
                You are logged in successfully! Now you can create a new stadium or book a place.
                <p><a href="{{ route('stadiums') }}"> Lets go to the stadiums!</a></p>
            @endif
        </div>
    </div>
@endsection