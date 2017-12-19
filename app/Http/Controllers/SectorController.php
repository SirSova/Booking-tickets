<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $sector = Sector::find($id);

        return view('sector.show_places', [
            'sector' => $sector,
        ]);
    }

    /**
     * Return places of sector
     * @param $id
     * @return mixed
     */
    public function getPlaces($id)
    {
        $sector = Sector::find($id);
        $places = $sector->places()->with('row')->get()->groupBy('row_id');

        return $places;
    }
}
