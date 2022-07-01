<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Collector;

class LandingPageController extends Controller
{
    public function home(){
        $collectors = Collector::count();
        $cars = Car::count();
        $users = User::count();

        return view('landingPage.home', compact('collectors','cars','users'));
    }
}
