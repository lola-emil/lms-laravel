<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller {

    public function addUserPage() {
        return view("admin.userForm");
    }

    public function updateUserPage($id) {
        $user = User::find($id);
        return view("admin.userForm");
    }

    public function addUser(Request $request) {

    }

    public function updateUse(Request $request) {

    }
}
