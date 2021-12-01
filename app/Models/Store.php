<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','desc','image','category_id'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class)
         ->selectRaw('count(store_id) as s, store_id, sum(rating)/count(store_id) as rating') ->groupBy('store_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
