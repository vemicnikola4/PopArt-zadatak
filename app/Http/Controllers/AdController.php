<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Ad_category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::orderBy('title')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($custumer)
    {
        $ad_categories = Ad_category::orderBy('title')->get();
        return view('ad.create',[
            'custumer'=>$custumer,
            'ad_categories'=>$ad_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ad $ad)
    {
        //
    }
}
