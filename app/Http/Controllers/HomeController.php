<?php

namespace App\Http\Controllers;

use App\Models\Repair;use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;

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
        $repairs = Repair::all();
        $total = Repair::all()->count();
        $booked = Repair::where('status', 'Booked')->count();
        $completed = Repair::where('status', 'Completed')->count();
        $collected = Repair::where('status', 'Collected')->count();

        return view('home', compact('repairs', 'total', 'booked', 'completed', 'collected'));
    }

    public function overview()
    {
        $repairs = Repair::all();
        $total = Repair::all()->count();
        $booked = Repair::where('status', 'Booked')->count();
        $completed = Repair::where('status', 'Completed')->count();
        $collected = Repair::where('status', 'Collected')->count();

        return view('overview', compact('repairs', 'total', 'booked', 'completed', 'collected'));
    }

    public function testEmail() {
        $otp = [];
        $user = [];
        Mail::to('mahlatsephokwane001@gmail.com')->send(new PasswordResetMail($otp,$user));
    }
}
