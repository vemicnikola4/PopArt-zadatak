<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->is_admin == 1){
            return view('admin.index');
        }elseif(Custumer::where('user_id', Auth::user()->id)->exists()){
            return redirect()->route('custumer.index');

        }elseif(Auth::user()){
            return view('custumer.create');

        }else{
            return view('home');
        }
    }
}
