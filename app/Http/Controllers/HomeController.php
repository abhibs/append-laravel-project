<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutUs;
use App\Models\Client;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 1)->take(6)->latest()->get();
        $about = About::find(1);
        $aboutusdatas = AboutUs::where('status', 1)->latest()->take(4)->get();
        return view('welcome', compact('clients', 'about', 'aboutusdatas'));
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
