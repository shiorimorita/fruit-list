<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','price','image','description'
    ];

    public function seasons(){
        return $this->belongsToMany(Season::class);
    }

    /* search */

    public function scopeSearchKeywords($query,$keyword){
        if(!empty($keyword)){

            $query->where('name', 'like' , "%{$keyword}%");
        }

        return $query;
    }

    public function scopeSortByPrice($query,$sort)
    {
        if($sort == 'price_up'){
            $query->orderBy('price','desc');
        }elseif ($sort == 'price_down'){
            $query->orderBy('price','asc');
        }

        return $query ;
    }
}
