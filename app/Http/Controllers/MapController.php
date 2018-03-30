<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
	    Mapper::map(53.381128999999990000, -1.470085000000040000);

	    return view('map')
	}
}


