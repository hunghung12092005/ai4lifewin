<?php

namespace App\Http\Controllers;

use App\Models\Major; // ✅ import model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả majors từ DB
        $majors = Major::all();

        // Truyền sang view welcome.blade.php
        return view('welcome', compact('majors'));
    }
}
