@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-unstyled">
                <li class="col-sm-3 text-center stadium"> <a href="#">Stadium 1</a></li>
                <li class="col-sm-3 text-center stadium"> <a href="#">Stadium 2</a></li>
                <li class="col-sm-3 text-center stadium"> <a href="#">Stadium 3</a></li>
                <li class="col-sm-3 text-center stadium"> <a href="#">Stadium 4</a></li>
                <li class="col-sm-3 text-center stadium"> <a href="#">Stadium 5</a></li>
            </ul>

        </div>
        <button class="col-sm-offset-5 col-sm-3 btn btn-default"> <i class="fa fa-plus"></i> Stadium add</button>

    </div>
@endsection