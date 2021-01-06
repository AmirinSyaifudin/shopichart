<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    //
    public function index()
    {
        return view('frontend.food.index');
    }
}