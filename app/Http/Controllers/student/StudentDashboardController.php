<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller {

    public function dashboardPage() {
        return view("student/dashboard");
    }
}
