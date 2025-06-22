<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=['house_id','users_id','check_in','check_out','status'];
public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}
   public function house(){
    return $this->belongsTo(House::class, 'house_id');
}
    public function histories(){
    return $this->hasMany(History::class);
}
}
