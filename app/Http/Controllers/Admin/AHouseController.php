<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\house;
use App\Models\User;
use App\Models\Category;

class AHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = House::with(['user', 'category']);
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
    
            $query->where(function ($q) use ($search) {
                $q->where('location', 'like', "%{$search}%")
                  ->orWhere('dec_', 'like', "%{$search}%")
                  ->orWhere('City', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('category', function ($catQuery) use ($search) {
                      $catQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
    
        $houses = $query->get();
        $users = User::where('role', 'users')->get();
        $categories = Category::all();
    
        return view('admin.house.index', compact('houses', 'users', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

           //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $houses = House::findOrFail($id);
        return view('admin.house.edit', compact('houses' ));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $houses = House::findOrFail($id);
        //
        $validated = $request->validate([
           
            'status'=> 'required|string|in:pending,approved,rejected',
            
        ]);
        $houses->update([
           
            'status' => $validated['status'],
        ]);
        return redirect()->route('house.index')->with('success', 'House updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     
     */
    public function destroy(string $id)
    {
        $houses = House::findOrFail($id); // Retrieve the house or throw 404 if not found
        $houses->delete();
    
        return redirect()->route('house.index')->with('success', 'House deleted successfully!');
        //
    }
}
