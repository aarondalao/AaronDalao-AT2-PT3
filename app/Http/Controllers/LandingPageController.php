<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Collector;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function home(){
        $collectors = Collector::count();
        $cars = Car::count();
        $users = User::count();

//        check if the the user is authenticated or not.
        if(Auth::check()){
            return view('dashboard', compact('collectors','cars','users'));
        }else{
            return view('landingPage.home', compact('collectors','cars','users'));
        }
    }

    public function about()
    {
        return view ('landingPage.about');
    }

    public function termsOfUse()
    {
        return view('landingPage.terms-of-use');
    }
}
