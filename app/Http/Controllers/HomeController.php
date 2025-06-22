<?php

namespace App\Http\Controllers;

use App\Models\house;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\BookingCreated;
use App\Notifications\BookingApproved;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $Category = Category::all();
    
   
        if ($request->has('category_id')) {
            $houses = House::where('category_id', $request->category_id)->get();
        } else {
           
            $houses = House::all();
        }
         $UnreadNotificationsCount = auth()->user()->UnreadNotifications->count();
    
        
        return view('home.index', compact('Category', 'houses','UnreadNotificationsCount'));
    }
   
   
}
