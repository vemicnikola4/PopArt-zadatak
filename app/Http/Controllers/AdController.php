<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Custumer;
use App\Models\Ad_category;
use Illuminate\Http\Request;
use App\Models\Ad_category_2;
use App\Models\Ad_category_3;
use App\Models\Image;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:3',
            'price' => 'digits_between:0,1000000',
            'condition'=>'required|string',
            'image' => 'image|between:1,5000',
            'category'=>'required|string'        
        ]);

        $ad = new Ad;
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->condition = $request->condition;
        $custumer = Custumer::where('user_id', Auth::user()->id)->first();


        $ad->custumer_id = $custumer->id;
        
       
        if ($category = Ad_category_3::find($request->category)){
            $category_3 = $category;
            $category_2 =  Ad_category_2::find($category_3->ad_category_2_id);
            $category =  Ad_category::find($category_2->ad_category_id);

            $ad->ad_category_id = $category->id;
            $ad->ad_category_2_id = $category_2->id;
            $ad->ad_category_3_id = $category_3->id;
        }elseif($category = Ad_category_2::find($request->category)){
            $category_2 = $category;
            $category =  Ad_category::find($category_2->ad_category_id);

            $ad->ad_category_id = $category->id;
            $ad->ad_category_2_id = $category_2->id;
        }else{
            $ad->ad_category_id = $request->category;
        }
        $ad->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            //generisemo naziv slike id filma i ekstenzija fajla
            $imgName =  $ad->id . '.' . $request->file('image')->extension();
         
            //smestamo fajl u folder public/custumer_images
            Storage::disk('public')
            ->putFileAs('ad_images', $request->file('image'), $imgName);
         
            //u bazi belezimo putanju od public foldera
            $image = new Image();
            $image->name = 'ad_images/'.$imgName;
            $image->ad_id = $ad ->id;

            $image->save();

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
    public function show(ad $ad)
    {
        $img = Image::where('ad_id',$ad->id)->first();
        if ( $img !== NULL ){
            if(Storage::disk('public')->exists($img->name)){
                $img = Storage::url($img->name);
            }else{
                $img = Storage::url('ad_images/no_image.jpg');
            }
        }else{
            $img = Storage::url('ad_images/no_image.jpg');
        
        }
        
        return view(
            'ad.show',[
                'ad'=> $ad,
                'img'=>$img
                            ]
            );
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ad $ad)
    {
        $ad_categories = Ad_category::orderBy('title')->get();

        return view(
            'ad.edit',[
                'ad'=>$ad,
                'ad_categories'=>$ad_categories
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ad $ad)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:3',
            'price' => 'digits_between:0,1000000',
            'condition'=>'required|string|in:Novo,Kao Novo,Polovno,Osteceno',
            'image' => 'required|image|between:1,5000|',
            'category'=>'required'        
        ]);
        
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //generisemo naziv slike id filma i ekstenzija fajla
            $imgName =  $ad->id . '.' . $request->file('image')->extension();
         
            //smestamo fajl u folder public/custumer_images
            if(!Storage::disk('public')->exists( $imgName)){
                Storage::disk('public')
                ->putFileAs('ad_images', $request->file('image'), $imgName);
            }
           
         
            //u bazi belezimo putanju od public foldera
            $image= Image::where('ad_id',$ad->id)->get()->first();
            $image=Image::find($image->id);
            $image->name = 'ad_images/'.$imgName;
            $image->save();
            

            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->price = $request->price;
            $ad->condition = $request->condition;


            
        
            if ($category = Ad_category_3::find($request->category)){
                $category_3 = $category;
                $category_2 =  Ad_category_2::find($category_3->ad_category_2_id);
                $category =  Ad_category::find($category_2->ad_category_id);

                $ad->ad_category_id = $category->id;
                $ad->ad_category_2_id = $category_2->id;
                $ad->ad_category_3_id = $category_3->id;
            }elseif($category = Ad_category_2::find($request->category)){
                $category_2 = $category;
                $category =  Ad_category::find($category_2->ad_category_id);

                $ad->ad_category_id = $category->id;
                $ad->ad_category_2_id = $category_2->id;
            }else{
                $ad->ad_category_id = $request->category;
            }
            $ad->save();

            $request->session()->flash('alert_type','success');
            $request->session()->flash('msg','Succssesfuly updated');

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
     * Remove the specified resource from storage.
     */
    public function destroy(ad $ad)
    {
        
        $image = Image::find($ad->image->id);
        Storage::disk('public')->delete($image->name);

        $image->delete();
        $ad->delete();
        session()->flash('alert_type','success');
        session()->flash('msg','Succssesfuly deleted');

        if (Auth::user()->is_admin == 1){
            return view('admin.index');
        }else{
            return redirect()->route('custumer.index');
        }

    }
    public function delete(ad $ad)
    {
        return view('ad.delete',[
            'ad'=>$ad
        ]);
    }
}
