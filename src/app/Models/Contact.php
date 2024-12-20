<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'last_name', 'first_name', 'gender', 'email', 'tel','tel1','tel2','tel3', 'address', 'building', 'detail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
        $query->where('first_name', 'LIKE', "%{$keyword}%")
        ->orWhere('last_name', 'LIKE', "%{$keyword}%")
        ->orWhere('email', 'LIKE', "%{$keyword}%");
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
        $query->where('gender', (int) $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
        $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
        $query->whereDate('created_at', $date);
        }
    }
}
