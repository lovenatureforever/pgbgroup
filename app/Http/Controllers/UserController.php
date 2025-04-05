<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        // Validate the request inline
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        // Create the user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'active' => false,
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        // Validate the request inline
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id, // Exclude current user's email
            'name' => 'required',
        ]);

        $user->update([
            'email' => $validated['email'],
            'name' => $validated['name'],
        ]);
        return redirect()->route('admin.users.index');
    }

    public function apiIndex()
    {
        $users = User::all();
        return response()->json(['data' => $users], ResponseAlias::HTTP_OK);
    }

    public function active(Request $request, $id)
    {
        $validatedData = $request->validate([
            'active' => 'required|boolean',
        ]);

        if ($id != $request->id) {
            return response()->json(['error' => 'ID mismatch.'], ResponseAlias::HTTP_BAD_REQUEST);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], ResponseAlias::HTTP_NOT_FOUND);
        }

        $user->active = $validatedData['active'];
        $user->save();

        return response()->json(['message' => 'User status updated successfully.', 'user' => $user], ResponseAlias::HTTP_OK);
    }

    public function apiResetPassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required|string|min:8',
        ]);

        if ($id != $request->id) {
            return response()->json(['error' => 'ID mismatch.'], ResponseAlias::HTTP_BAD_REQUEST);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], ResponseAlias::HTTP_NOT_FOUND);
        }

        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return response()->json(['message' => 'Password reset successfully.', 'user' => $user], ResponseAlias::HTTP_OK);
    }

    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json(['error' => 'User not found.'], ResponseAlias::HTTP_NOT_FOUND);
        }

        try {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user.', 'details' => $e->getMessage()], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
