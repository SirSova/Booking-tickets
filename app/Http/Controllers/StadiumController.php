<?php

namespace App\Http\Controllers;

use App\Stadium;
use Illuminate\Http\Request;

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
     * Store new stadium
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        return redirect()->route('stadiums');
    }


}
