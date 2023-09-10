<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Profile::find(1);
        return view('admin.profile.index', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'content' => 'required',

        ], [

            'name.required' => 'Name is Required',
            'content.required' => 'Content is Required',
        ]);
        $id = $request->id;
        // $old_img = $request->old_image;

        if ($request->file('image')) {
            // unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(1920, 1280)->save('storage/profile/' . $name_gen);
            $save_url = 'storage/profile/' . $name_gen;

            Profile::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $save_url,
                'content' => $request->content,
            ]);
            $notification = array(
                'message' => 'Profile Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {

            Profile::findOrFail($id)->update([
                'name' => $request->name,
                'content' => $request->content,
            ]);
            $notification = array(
                'message' => 'Profile Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }
}