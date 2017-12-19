<?php

namespace App\Http\Controllers;

use App\Events\BookingPlace;
use App\Events\CloseModalPlace;
use App\Events\OpenModalPlace;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Find place to return than in modal info + state(by user_id not null)
     * @param Request $request
     * @return mixed
     */
    public function getPlace(Request $request)
    {
        $place = Place::findOrFail($request->get('place'));

        event(new OpenModalPlace($place));

        return $place;
    }

    /**
     * Reserve place
     * or close modal -> show all
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function booking(Request $request)
    {
        $place = Place::findOrFail($request->get('place'));

        if (isset($request->close_modal))
            event (new CloseModalPlace($place));
        else {
            $place->user_id = $request->user()->id;
            $place->save();
            event(new BookingPlace($place));
        }

        return $place;
    }
}
