<?php

namespace App\Http\Controllers;

use App\Place;
use App\Row;
use App\Sector;
use App\Stadium;
use App\Http\Requests\StoreStadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StadiumController extends Controller
{
    /**
     * View with all stadiums
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stadiums = Stadium::all();

        return view('stadium.index', [
            'stadiums' => $stadiums
        ]);
    }

    /**
     * Return view with create form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('stadium.create');
    }

    /**
     * Store stadium -> sectors -> rows -> places
     * @param StoreStadium $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStadium $request)
    {
        $user_id = $request->user()->id;

        $stadium = Stadium::create([
            'owner_id' => $user_id,
            'name' => $request->get('name'),
        ]);

        //create array of sectors to push them in table sectors(1 query)
        $sectors_list = [];
        for ($i = 0; $i < intval($request->get('sector_number')); $i++) {
            $sector = [];
            $sector['name'] = 'Sector ' . $i;
            $sector['stadium_id'] = $stadium->id;
            $sector['created_at'] = $stadium->created_at;
            $sector['updated_at'] = $stadium->updated_at;
            $sectors_list[] = $sector;
        }

        DB::table('sectors')->insert($sectors_list);
        $sectors = $stadium->sectors()->get();

        //create array of rows to push them in table rows(1 query)
        $rows = [];
        foreach ($sectors as $sector)
            for ($i = 0; $i < intval($request->get('rows_number')); $i++) {
                $row = [];
                $row['number'] = $i + 1;
                $row['sector_id'] = $sector->id;
                $row['created_at'] = $sector->created_at;
                $row['updated_at'] = $sector->updated_at;
                $rows[] = $row;
            }

        DB::table('rows')->insert($rows);
        $rows = Row::whereIn('sector_id', $sectors->pluck('id'))->get();

        //create array of places to push them in table places(1 query)
        $places = [];
        foreach ($rows as $row)
            for ($i = 0; $i < intval($request->get('rows_number')); $i++) {
                $place = [];
                $place['row_id'] = $row->id;
                $place['price'] = $request->get('price');
                $place['created_at'] = $row->created_at;
                $place['updated_at'] = $row->updated_at;
                $places[] = $place;
            }

        DB::table('places')->insert($places);

        return redirect()->route('stadiums');
    }

    /**
     * Return view with stadium's sectors by stadium_id
     * @param Request $request
     * @param $stadium_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $stadium_id)
    {
        $stadium = Stadium::find($stadium_id);
        $sectors = $stadium->sectors()->get();

        return view('stadium.show', [
            'stadium' => $stadium,
            'sectors' => $sectors,
        ]);
    }


}
