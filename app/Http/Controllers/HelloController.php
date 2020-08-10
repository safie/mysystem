<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        $first_name = "john";
        $last_name = "Doe";

        return view('viewhello', compact(
            'first_name',
            'last_name'
        ));
    }
}
