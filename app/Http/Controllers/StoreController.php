<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRquest;
use App\Http\Requests\UpdateStoreRquest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('rating')->paginate(10);
        ;
        
        return view('admin.store.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.store.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRquest $request)
    {



        $data = $request->validated();



        $image= $request->file('image');
        $path='images/stores/';
        $name=time()+rand(1,10000).'.'.$image->getClientOriginalExtension();
        Storage::disk('public')->put($path.$name,file_get_contents($image));
        $data['image'] = $path.$name;

        Store::create($data);
        toastr()->success('Added successfully!');
        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {

        $categories = Category::all();
        return view('admin.store.update',compact('categories'),compact("store"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRquest $request, Store $store)
    {



        if( $request->file('image')){
            $image= $request->file('image');
            $path='images/';
            $name=time()+rand(1,10000).'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->put($path.$name,file_get_contents($image));
            $store->image=$path.$name;
       }
        $store->name = $request->name;
        $store->desc = $request->desc;
        $store->category_id = $request->category_id;
        $store->save();
        toastr()->success('Updated successfully!');

        return  redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        toastr()->success('Deleted successfully!');
        return redirect()->back();
    }
}
