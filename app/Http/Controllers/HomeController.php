<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Custumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Ad_category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        If(Auth::user()){
            if (Auth::user()->is_admin == 1){
                return redirect()->route('admin.index');
            }elseif(Custumer::where('user_id', Auth::user()->id)->exists()){
                return redirect()->route('custumer.index');
    
            }else{
    
                return view('custumer.create');
    
            }
        }else{

            $ads = Ad::orderBy('created_at','desc')->paginate(5);

            $ad_categories = Ad_category::orderBy('title')->get();

            return view('home',[
                'ads'=> $ads,
                'ad_categories'=>  $ad_categories
            ]);


        }
    }
}
