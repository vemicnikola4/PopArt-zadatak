<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad_category;
use App\Models\Ad_category_2;
use App\Models\Ad_category_3;
use App\Models\Custumer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $custumers = Custumer::orderBy('name')->get();
        $ad_categories = Ad_category::orderBy('title')->get();
        // $ad_categories_2 = Ad_category_2::orderBy('title')->get();
        // $ad_categories_3 = Ad_category_3::orderBy('title')->get();
        return view('admin.index',[
            'ad_categories'=> $ad_categories
        ]);
    }
}
