<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'img', 'location', 'dec_', 'price', 'numofR', 'City', 'status','is_featured', 'category_id', 'users_id'
    ];

    protected $casts = ['img' => 'array'];

    // علاقات
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    // Accessors
    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'No category';
    }

    public function getUserNameAttribute()
    {
        return $this->user->name ?? 'No user';
    }
}
