<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserController extends Controller {

    public function addUserPage() {

        return view("admin.userForm", compact("users"));
    }

    public function updateUserPage($id) {
        $user = User::find($id);
        return view("admin.userForm");
    }

    public function addUser(Request $request) {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required',
            ]);
        
            // Generate a temporary password
            $temporaryPassword = Str::random(10); // Example temporary password length 10 characters
        
            // Create a new user with the validated data
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = bcrypt($validated['password']); // Hash the actual password
            $user->role = $validated['role'];
        
            // Store the temporary password in the 'temporary_password' column
            $user->temporary_password = Hash::make($temporaryPassword); // Hash the temporary password before saving
            $user->save(); // Save the user to the database
        
            // Return a success response with the temporary password included
            return response()->json([
                'message' => 'User created successfully with a temporary password!',
                'user' => $user,
                'temporary_password' => $temporaryPassword, // Send the temporary password back
            ], 201); // Return a 201 Created status code
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors and send as JSON
            return response()->json([
                'error' => 'Validation Error',
                'message' => $e->getMessage(),
                'errors' => $e->errors(),
            ], 422); // Unprocessable Entity (422)
    
        } catch (\Exception $e) {
            // Catch any other general errors
            return response()->json([
                'error' => 'An unexpected error occurred',
                'message' => $e->getMessage(),
            ], 500); // Internal Server Error (500)
        }
    }

    public function searchUser(Request $request) {
        
    }

    public function updateUser(Request $request, $id) {
        // Find the user by ID
        $user = User::find($id);
    
        // Check if user exists
        if (!$user) {
            return response()->json([
                'error' => 'User not found',
                'message' => 'The user with the given ID does not exist.',
            ], 404); // Not Found (404)
        }
    
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Exclude current user's email from unique check
            'password' => 'nullable|string|min:8', // Password is optional during update
            'role' => 'required|exists:roles,id', // Assuming role is stored in roles table
        ]);
    
        // Update user data
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role'];
    
        // If password is provided, hash and update it
        if ($request->has('password') && $request->password) {
            $user->password = bcrypt($validated['password']); // Hash the new password
        }
    
        // Save the updated user data
        $user->save();
    
        // Return a success response
        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 200); // OK (200)
    }

}
