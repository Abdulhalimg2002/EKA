<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable=['logo','name'];
    public function houses(){
        return $this->hasMany(house::class);
    }
    public function histories(){
        return $this->hasMany(history::class);
    }
    //
}
