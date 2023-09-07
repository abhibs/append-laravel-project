<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function create()
    {
        return view('admin.about.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'About Us Title is Required',
            'content.required' => 'About Us Content is Required',
        ]);

        About::insert([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'About Us Content Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('about')->with($notification);
    }
    public function index()
    {
        $data = About::find(1);
        return view('admin.about.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'About Us Title is Required',
            'content.required' => 'About Us Content is Required',
        ]);
        $id = $request->id;

        About::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'About Us Content Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
