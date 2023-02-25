<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'count'
    ];

    public function properties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function scopeFilter($query, $filters)
    {
        $data = [];
        foreach ($filters as $key => $value){
            $filterQuery = $query->whereHas('properties', function ($q) use ($key, $value) {
                $q->where('property', $key)->whereIn('value', $value);
            });
            $data [] = $filterQuery->get();
        }
        return $data;
    }
}
