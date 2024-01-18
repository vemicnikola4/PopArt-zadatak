<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custumer = Custumer::where('user_id', Auth::user()->id)->first();
        // return Auth::user()->id;
        if(Storage::disk('public')->exists($custumer->image)){
            $img = Storage::url($custumer->image);
        }else{
            $img = 'custumer_images/no_image,jpg';
        }
        return view('custumer.index',[
            'custumer' => $custumer ,
            'img' => $img
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone_number' => 'string|max:255|min:3',
            'location' =>'string|max:255|min:3',
            'image' => 'image|between:1,5000'
            
        ]);
        // Custumer::create($request->all());
        $custumer = new Custumer;
        $custumer->name = ($request->name);
        $custumer->last_name = ($request->last_name);
        $custumer->phone_number = ($request->phone_number);
        $custumer->location = ($request->location);
        
        $custumer->user_id = Auth::user()->id;

        $custumer->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            //generisemo naziv slike id filma i ekstenzija fajla
            $imgName =  $custumer->user_id . '.' . $request->file('image')->extension();
         
            //smestamo fajl u folder public/custumer_images
            Storage::disk('public')
            ->putFileAs('custumer_images', $request->file('image'), $imgName);
         
            //u bazi belezimo putanju od public foldera
            $custumer->image = 'custumer_images/'.$imgName;
            $custumer->save();

            $request->session()->flash('alert_type','success');
            $request->session()->flash('msg','Succssesfuly created');

            if (Auth::user()->is_admin == 1){
                return view('admin.index');
            }else{
                return redirect()->route('custumer.index');
            }
        }else{
            $request->session()->flash('alert_type','warning');
            $request->session()->flash('msg','Record not created');

            if (Auth::user()->is_admin == 1){
                return view('admin.index');
            }else{
                return redirect()->route('custumer.index');
            }
        }
         
    }

    /**
     * Display the specified resource.
     */
    public function show(Custumer $custumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Custumer $custumer)
    {
        return view( 'custumer.edit',['custumer'=> $custumer]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Custumer $custumer)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'phone_number' => 'string|max:255|min:3',
            'location' =>'string|max:255|min:3',
            
        ]);

        if ($custumer-> name == $request->input('name') && $custumer-> last_name == $request->input('last_name') &&  $custumer-> phone_number == $request->input('phone_number') && $custumer-> location == $request->input('location')&&$custumer-> image == $request->input('image')){
            $request->session()->flash('alert_type','warning');
            $request->session()->flash('msg','Nothing to update');
        }else{
            $custumer->update($request->all());
            $request->session()->flash('alert_type','success');
            $request->session()->flash('msg','Succssesfuly updated');
        }
        

        return redirect()->route('custumer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Custumer $custumer)
    {
        $custumer->delete();

        //flash sesije traju tacno jedan zahtev
        //moze i bez requesta da stoji
        session()->flash('alert_type','success');
        session()->flash('msg','Succssesfuly deleted');

        if ( Auth::user()->is_admin==1){
            return redirect()->route ('admin.custumers.all');

        }else{
            return view('custumer.create');
        }
        
    }
    public function all(){
        $custumers = Custumer::orderBy('name')->paginate(5);
        return view('custumer.all',[
            'custumers'=> $custumers
        ]);

    }
    public function delete($custumer){
        $custumer = Custumer::find($custumer);
        return view('custumer.delete',[
            'custumer'=>$custumer
        ]);
    }
}
