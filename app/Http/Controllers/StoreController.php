<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRquest;
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
        $stores = Store::paginate(10);
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

        $image= $request->file('image');
        $path='images/';
        $name=time()+rand(1,10000).'.'.$image->getClientOriginalExtension();
        Storage::disk('public')->put($path.$name,file_get_contents($image));
        $store = new Store();
        $store->name = $request->name;
        $store->image=$path.$name;
        $store->desc = $request->desc;
        $store->category_id = $request->category_id;


        $store->save();
        // Store::create($request->validate());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
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
