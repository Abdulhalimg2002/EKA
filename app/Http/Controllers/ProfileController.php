<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\House;
use App\Models\User;
use App\Models\booking;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = Auth::user();
        $house=House::all();
        $booking=booking::all();
         $UnreadNotificationsCount = auth()->user()->UnreadNotifications->count();
        return view('Profile.index',compact('User','house','booking','UnreadNotificationsCount'));
        //
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
        //
        $User=User::find($id);
   return view('Profile.edit', compact('User'));

    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    // ✅ تحقق من صحة البيانات
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // ✅ جلب المستخدم
    $user = User::findOrFail($id);

    // ✅ تحديث البيانات
    $user->name = $validated['name'];
    $user->email = $validated['email'];

    // ✅ تحديث كلمة المرور فقط إذا أدخلها المستخدم
    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    $user->save();

    // ✅ إعادة التوجيه برسالة نجاح
    return redirect()->route('Profile')->with('success', 'User updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
