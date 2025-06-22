<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    //
    protected $fillable=['users_id','category_id','house_id','bookings_id'];
     public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id');
    }
}
