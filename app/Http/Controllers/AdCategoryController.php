<?php

namespace App\Http\Controllers;

use App\Models\Ad_category;
use Illuminate\Http\Request;

class AdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ad_categories = Ad_category::orderBy('title')->paginate(5);

        // dd($ad_categories);
        return view('ad_category.index',[
           'ad_categories'=> $ad_categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ad_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
           
        ]);
        $ad_category = new Ad_category();
        $ad_category ->title = request('title');


        $ad_category->save();
        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly added');

        return redirect()->route('admin.ad_category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Ad_category $ad_category)
    {
        return view( 'ad_category.show',
        [
          'ad_category'=> $ad_category   
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad_category $ad_category)
    {
        return view( 'ad_category.edit',['ad_category'=> $ad_category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad_category $ad_category)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',    
        ]);

        $ad_category->update($request->all());

        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly updated');

        return redirect('admin/ad_category');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad_category $ad_category)
    {
        $ad_category->delete();

        //flash sesije traju tacno jedan zahtev
        //moze i bez requesta da stoji
        session()->flash('alert_type','success');
        session()->flash('msg','Succssesfuly deleted');

        return redirect('admin/ad_category');
        
    }
    public function delete($ad_category){
        $ad_category = Ad_category::find($ad_category);
        return view('ad_category.delete',[
            'ad_category'=>$ad_category
        ]);
    }
}
