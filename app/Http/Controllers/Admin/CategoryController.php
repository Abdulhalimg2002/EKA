<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\house;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }
    
        $Category = $query->orderBy('id', 'desc')->get();
    
        return view('admin.category.index', compact('Category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
        $Category =Category::all();
        return view('admin.category.create', compact('Category'));
    
        // return view('admin.category.create',compact('house'));
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',           
            'logo'=>'required|image|mimes:jpeg,png,jpg|max:2048',
          
            
        ]);
        $imagePath=$request->file('logo')->store('Category','public');
        Category::create([
            'name'=>$request->name,
            
            'logo'=>$imagePath,
            'is_featured'=>$request->has('is_featured'),
        ]);
        return redirect()->route('category.index')->with('success','booking created Successfully');
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
        //
        $category = Category::findOrFail($id);
        
        
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // make the logo field nullable
        'name' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id);

    // Check if a new logo is uploaded
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('categories', 'public');
        $category->logo = $logoPath;
    }

    // Only update 'name' and 'is_featured' (and 'logo' if a new logo is uploaded)
    $category->update($request->only(['name', 'is_featured']));

    return redirect()->route('category.index')->with('success', 'Category updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
