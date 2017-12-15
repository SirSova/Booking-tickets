@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            <form action="{{ route('store_stadium') }}" method="POST" id="stadium_form">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Stadium name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sector_number" class="col-sm-2 col-form-label">Number of sectors</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sector_number" id="sector_number"
                               placeholder="Sectors number" value="{{ old('sector_number') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rows_number" class="col-sm-2 col-form-label">Numbers of rows</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rows_number" id="rows_number"
                               placeholder="Rows number(each sector has the same numbers of rows)" value="{{ old('rows_number') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="places_number" class="col-sm-2 col-form-label">Numbers of places</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="places_number" id="places_number"
                               placeholder="Places number(each row has the same numbers of places)" value="{{ old('places_number') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price on ticket</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" id="price"
                               placeholder="Price" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="row text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection