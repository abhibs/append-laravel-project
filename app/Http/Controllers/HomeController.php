<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function enquiry(Request $request)
    {
        Enquiry::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]); 
        $notification = array(
            'message' => 'Enquery Form Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
