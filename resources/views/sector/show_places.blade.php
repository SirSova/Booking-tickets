@extends('app')

@section('content')
    <div class="container">
        <div class="well" id="places">
            <h3 class="text-center"> Sector {{ $sector->name }}</h3>

            <sector sector_id="{{ $sector->id }}" sector_url="{{ route('places',$sector->id) }}"
                booking_url="{{ route('booking_ticket') }}"></sector>
            {{--@foreach($places->groupBy('row_id') as $place_row)--}}
                {{--<div class="row col-sm-6 col-xs-12 col-centered">--}}
                    {{--@foreach($place_row as $place)--}}
                        {{--<div class="place text-center"><p>{{ $loop->index + 1 }}</p></div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--@endforeach--}}
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection