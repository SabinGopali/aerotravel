<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use App\Models\PassengerDetails;
use App\Models\ScheduleFlight;
use App\Models\Tdetail;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $user = User::where('role_id', 1)->get();
        $flights = ScheduleFlight::all();
        $passenger = PassengerDetails::all();
        $feedback = feedback::all();
        $traveller = Tdetail::all();
        return view('admin.dashboard', compact('user', 'flights', 'passenger', 'feedback', 'traveller'));
    }

    public function adminflightdetail()
    {
        return view('admin.flightdetail');
    }

    public function feedback()
    {
        $feedback = feedback::all();
        return view('admin.adminfeedback', compact('feedback'));
    }

    // public function adminaddflight(){
    //     return view('admin.addflight');
    // }

    public function scheduleflight()
    {
        return view('admin.scheduleflight');
    }

    public function schedule()
    {
        return view('admin.schedule');
    }

    // public function dashboard(){
    //     return view('admin.dashboard');
    // }

    public function adminpassengerlist()
    {
        $passengerlist = PassengerDetails::all();
        return view('admin.passengerlist', compact('passengerlist'));
    }

    public function admintripdetails()
    {
        return view('admin.tripdetails');
    }

    public function adminaddtripdetails()
    {
        return view('admin.addtripdetails');
    }

    public function admintravellerlist()
    {
        $tdetail = Tdetail::all();
        return view('admin.travellerlist',compact('tdetail'));
    }
}
