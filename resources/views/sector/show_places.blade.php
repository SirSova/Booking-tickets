@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            <h3 class="text-center"> Sector {{ $sector->name }}</h3>
            @foreach($places->groupBy('row_id') as $place_row)
                <div class="row col-sm-6 col-xs-12 col-centered">
                    @foreach($place_row as $place)
                        <div class="place text-center"><p>{{ $loop->index + 1 }}</p></div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection