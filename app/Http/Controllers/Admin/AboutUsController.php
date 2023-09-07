<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Carbon;

class AboutUsController extends Controller
{
    public function create()
    {
        return view('admin.aboutus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required',
        ], [
            'icon.required' => 'About Us Features Title is Required',
            'title.required' => 'About Us Features Title is Required',
            'content.required' => 'About Us Content is Required',
        ]);
        AboutUs::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'About Us Features Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('aboutus')->with($notification);

    }

    public function index()
    {
        $datas = AboutUs::latest()->get();
        return view('admin.aboutus.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = AboutUs::findOrFail($id);
        return view('admin.aboutus.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        AboutUs::findOrFail($id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'About Us Features Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('aboutus')->with($notification);

    }

    public function delete($id)
    {
        AboutUs::findOrFail($id)->delete();
        $notification = array(
            'message' => 'About Us Features Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        AboutUs::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'About Us Features InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        AboutUs::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'About Us Features Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }
}
