<?php

namespace App\Http\Controllers;

use App\Events\BookingPlace;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function booking(Request $request)
    {
        $place = Place::findOrFail($request->get('place'));

        $place->user_id = $request->user()->id;
        $place->save();

        event(new BookingPlace($place));

        return $place;
    }
}
