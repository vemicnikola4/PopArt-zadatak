<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custumer = Custumer::where('user_id', Auth::user()->id)->first();
        // return Auth::user()->id;
        return view('custumer.index',['custumer' => $custumer ]);
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
            
        ]);
        // Custumer::create($request->all());
        $custumer = new Custumer;
        $custumer->name = ($request->name);
        $custumer->last_name = ($request->last_name);
        $custumer->phone_number = ($request->phone_number);
        $custumer->location = ($request->location);
        $custumer->user_id = Auth::user()->id;
        $custumer->save();

        $request->session()->flash('alert_type','success');
        $request->session()->flash('msg','Succssesfuly created');

        if (Auth::user()->is_admin == 1){
            return view('admin.index');
        }else{
            return redirect()->route('custumer.index');
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

        if ($custumer-> name == $request->input('name') && $custumer-> last_name == $request->input('last_name') &&  $custumer-> phone_number == $request->input('phone_number') && $custumer-> location == $request->input('location')){
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
        //
    }
}
