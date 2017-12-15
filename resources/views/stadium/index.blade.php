@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-unstyled">
                @foreach($stadiums as $stadium)
                    <li class="col-sm-3 text-center stadium">
                        <a href="{{ route('stadium_show', $stadium->id) }}"> {{ $stadium->name }}</a>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="row">
            <div class="text-center">
                <a href="{{ route('create_stadium') }}" class="btn btn-default">
                    <i class="fa fa-plus"></i> Stadium add
                </a>
            </div>
        </div>
    </div>
@endsection