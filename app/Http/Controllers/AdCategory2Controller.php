<?php

namespace App\Http\Controllers;

use App\Models\Ad_category;
use App\Models\Ad_category_2;
use Illuminate\Http\Request;

class AdCategory2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($ad_category_id)
    {
        $ad_category = Ad_category::find($ad_category_id);
        return view('ad_category_2.create',[
            'ad_category'=> $ad_category
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
           
        ]);
        $ad_category_2 = new Ad_category_2();
        $ad_category_2 ->title = request('title');
        $ad_category_2 ->ad_category_id = request('ad_category_id');

        // $ad_category = Ad_category::find(request('ad_category_id'))->first();

        $ad_category_2->save();
        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly added');

        return redirect()->route('admin.ad_category.show',['ad_category'  => $ad_category_2->ad_category_id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Ad_category_2 $ad_category_2)
    {
        return view( 'ad_category_2.show',
        [
          'ad_category_2'=> $ad_category_2   
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad_category_2 $ad_category_2)
    {
        return view( 'ad_category_2.edit',['ad_category_2'=> $ad_category_2]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad_category_2 $ad_category_2)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',    
        ]);

        $ad_category_2->update($request->all());

        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly updated');

        return redirect()->route('admin.ad_category.show', ['ad_category' => $ad_category_2->ad_category_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad_category_2 $ad_category_2)
    {
        $ad_category_2->delete();

        //flash sesije traju tacno jedan zahtev
        //moze i bez requesta da stoji
        session()->flash('alert_type','success');
        session()->flash('msg','Succssesfuly deleted');

        return redirect('admin/ad_category');
        
    }
    public function delete($ad_category_2_id){
        $ad_category_2 = Ad_category_2::find($ad_category_2_id);
        return view('ad_category_2.delete',[
            'ad_category_2'=>$ad_category_2
        ]);
    }
}
