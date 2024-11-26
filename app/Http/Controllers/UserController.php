<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showDashboard(){
        Gate::authorize('isAdmin');
        return view('dashboard');
   
    }

    public function destroy()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Check if the user has an associated image and delete it
        if ($user->image) { // Ensure $user->image is not null
            // Delete the user's associated image if it exists
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        // Log the user out after deletion
        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
