<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Bank;

class KonfirmsController extends Controller
{
    //
    public function index()
    {
        //
        $postings = Bank::get();
        return view('bookings.konfirms',compact('postings'));
    }
}
