@extends('app')

@section('content')
    <div class="container">
        <div class="well" id="places">
            <h3 class="text-center"> Sector {{ $sector->name }}</h3>

            <sector sector_id="{{ $sector->id }}" sector_url="{{ route('places',$sector->id) }}"
                get_place_url="{{ route('get_place') }}"></sector>

            <modal v-if="showModal" @close="showModal = false" booking_url="{{ route('booking_ticket') }}"></modal>
        </div>
    </div>
@endsection
