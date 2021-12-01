<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Store;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class WebController extends Controller
{
    public function index()
    {
        $search = request("search");
        $category_search = request("category_search");
        $categories = Category::all();

        $id = request("id");

        if(isset($id)){
            $store = Store::with('rating')->with("ratings")->where("id",$id)->first();
            $stores = Store::with('rating')->where("id","<>",$id)->where("category_id",$store->category_id)->get();
            // dd($store->ratings[0]->user_id);
            return view("store-details",compact("store","stores"));
        }
        if (isset($search) && !isEmpty($search)){
            $stores = Store::with('rating')->where("name",'like',"%".$search."%");
                if($category_search != -1){
                     $stores->where("category_id",$category_search);
                }

           $stores=  $stores->paginate(10);
            return view('index',compact('stores','categories',"search","category_search"));
        }

        if (isset($category_search) && $category_search != -1){

            $stores = Store::with('rating')->where("category_id",$category_search)->paginate(10);
            return view('index',compact('stores','categories',"search","category_search"));
        }
        $stores = Store::with('rating')->paginate(10);
        // dd($stores);
            return view('index',compact('stores','categories',"category_search"));

    }

    public function store(Request $request)
    {
            $rating = $request->rate;

            $store_id = $request->store_id;
            $user_id = $request->userIP;

            $ra = new  Rating();
            $ra->user_id = $user_id;
            $ra->rating = $rating;
            $ra->store_id = $store_id;
            $ra->save();
            return redirect()->back();
    }

    public function update(Request $request)
    {
        $rating = $request->rate;
        $ra = Rating::where("user_id",$request->userIP)->where("store_id",$request->store_id)->first();

        $ra->rating = $rating;
        $ra->update();
        toastr()->success('Updated successfully!');
        return  redirect()->back();

    }
}
