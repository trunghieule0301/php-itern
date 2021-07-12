<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_categories(){
        return view('admin.add_categories');
    }
}
