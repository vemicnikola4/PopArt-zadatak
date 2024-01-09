<?php

namespace App\Http\Controllers;

use App\Models\Ad_category_3;
use App\Models\Ad_category_2;
use Illuminate\Http\Request;

class AdCategory3Controller extends Controller
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
    public function create($ad_category_2)
    {
        $ad_category_2 = Ad_category_2::find($ad_category_2);
        return view('ad_category_3.create',[
            'ad_category_2'=> $ad_category_2
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
        $ad_category_3 = new Ad_category_3();
        $ad_category_3 ->title = request('title');
        $ad_category_3 ->ad_category_2_id = request('ad_category_2_id');

        // $ad_category = Ad_category::find(request('ad_category_id'))->first();



        $ad_category_3->save();

        $ad_category_2 = Ad_category_2::find($ad_category_3->ad_category_2_id);
        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly added');

        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly added');
        // return back();
        // return redirect()->action(
        //     [AdCategory2Controller::class, 'show'], ['ad_category_2'=> $ad_category_2->id]
        // );
        // return redirect()->route('admin.ad_category_2.show', ['ad_category_2' => $ad_category_2->id]);

        
        return view( 'ad_category_2.show',
        [
          'ad_category_2'=> $ad_category_2   
        ] );

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad_category_3 $ad_category_3)
    {
        return view( 'ad_category_3.show',
        [
          'ad_category_3'=> $ad_category_3   
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad_category_3 $ad_category_3)
    {
        return view( 'ad_category_3.edit',['ad_category_3'=> $ad_category_3]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad_category_3 $ad_category_3)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',    
        ]);

        $ad_category_3->update($request->all());

        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly updated');

        return redirect()->route('admin.ad_category_2.show', ['ad_category_2' => $ad_category_3->ad_category_2_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad_category_3 $ad_category_3){
        $ad_category_3->delete();

        //flash sesije traju tacno jedan zahtev
        //moze i bez requesta da stoji
        session()->flash('alert_type','success');
        session()->flash('msg','Succssesfuly deleted');

        return redirect()->route('admin.ad_category_2.show', ['ad_category_2' => $ad_category_3->ad_category_2_id]);

       
    }

    public function delete($ad_category_3){
        $ad_category_3 = Ad_category_3::find($ad_category_3);
        return view('ad_category_3.delete',[
            'ad_category_3'=>$ad_category_3
        ]);
    }
}
