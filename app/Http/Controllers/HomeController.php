<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buser;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $busers = Buser::simplePaginate(10);
        return view('buser.index', ['busers'=>$busers]);
    }
}
