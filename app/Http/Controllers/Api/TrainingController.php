<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Training;

class TrainingController extends Controller
{
    //
    public function index()
    {
        return Training::all();
    }
}
