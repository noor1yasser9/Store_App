<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->name);
       $d = Category::withTrashed()
       ->where('name',$this->name)->first();

       $c =  Category::withTrashed()
       ->where("name",$this->name)->first();
       if(!$c){
        return [
           'name' => 'required|unique:categories,name',
           'image'=> 'required'
        ];}
        else{
            // dd($c->deleted_at);


            $s=  Store::withTrashed()
            ->where("deleted_at", $c->deleted_at)
            ->restore();
            $c->restore();
        return ['name'=>'required',
        'image'=> 'required'];}
    }
}
