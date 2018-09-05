<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\DB;

use Auth;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Kapal;

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
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kapals = DB::table('kapal')->get();
        return view('home')->withDetails($kapals);
    }
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('kapal.create');
    }

}
