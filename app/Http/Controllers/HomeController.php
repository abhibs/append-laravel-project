<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutUs;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 1)->take(6)->latest()->get();
        $about = About::find(1);
        $aboutusdatas = AboutUs::where('status', 1)->latest()->take(4)->get();
        $servicedatas = Service::where('status', 1)->latest()->take(6)->get();
        $featuredcontent = Feature::find(1);
        $faqdatas = Faq::where('status', 1)->latest()->get();
        $teamdatas = Team::where('status', 1)->get();
        $testimonialdatas = Testimonial::where('status', 1)->get();
        $projectdatas = Project::where('status', 1)->get();


        return view('welcome', compact('clients', 'about', 'aboutusdatas', 'servicedatas', 'featuredcontent', 'faqdatas', 'teamdatas', 'testimonialdatas', 'projectdatas'));
    }

    public function enquiry(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ], [
            'email.required' => 'Email is Required',
        ]);
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

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'subject.required' => 'Subject is Required',
            'message.required' => 'Message is Required',
        ]);
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Contact Form Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}