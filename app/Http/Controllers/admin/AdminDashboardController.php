<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller {


    public function dashboardPage() {
        $users = User::orderBy("id", "desc")->get();

        return view("admin.dashboard", compact("users"));
    }
}
