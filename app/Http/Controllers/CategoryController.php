<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {



        $data = $request->validated();

        $image= $request->file('image');
        $path='images/categories/';
        $name=time()+rand(1,10000).'.'.$image->getClientOriginalExtension();
        Storage::disk('public')->put($path.$name,file_get_contents($image));
        $data['image'] = $path.$name;
        Category::create( $data);
     toastr()->success('Added successfully!');

    return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {



        $data = $request->validated();

        $image= $request->file('image');
        $path='images/categories/';
        $name=time()+rand(1,10000).'.'.$image->getClientOriginalExtension();
        Storage::disk('public')->put($path.$name,file_get_contents($image));
        $data['image'] = $path.$name;
       $category->update(  $data);
       toastr()->success('Updated successfully!');

       return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();
      Store::where("category_id",$category->id)->delete();
      toastr()->success('Deleted successfully!');

        return redirect()->route("category.index");
    }
}
