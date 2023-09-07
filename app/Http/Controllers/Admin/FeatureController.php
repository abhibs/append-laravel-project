<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FeatureController extends Controller
{
    public function create()
    {
        return view('admin.feature.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'imageone' => 'required',
            'imagetwo' => 'required',
        ], [
            'title.required' => 'Featured Content Title is Required',
            'content.required' => 'Featured Content is Required',
            'imageone.required' => 'Featured Content Image One is Required',
            'imagetwo.required' => 'Featured Content Image Two is Required',
        ]);
        $image = $request->file('imageone');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1000, 700)->save('storage/feature/' . $name_gen);
        $save_url = 'storage/feature/' . $name_gen;


        $image = $request->file('imagetwo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1000, 700)->save('storage/feature/' . $name_gen);
        $save_url1 = 'storage/feature/' . $name_gen;

        Feature::insert([
            'title' => $request->title,
            'content' => $request->content,
            'imageone' => $save_url,
            'imagetwo' => $save_url1,
        ]);

        $notification = array(
            'message' => 'Featured Content Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('feature')->with($notification);
    }

    public function index()
    {
        $data = Feature::find(1);
        return view('admin.feature.index', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $image = $request->file('imageone');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1000, 700)->save('storage/feature/' . $name_gen);
        $save_url = 'storage/feature/' . $name_gen;


        $image = $request->file('imagetwo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(1000, 700)->save('storage/feature/' . $name_gen);
        $save_url1 = 'storage/feature/' . $name_gen;

        Feature::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'imageone' => $save_url,
            'imagetwo' => $save_url1,
        ]);
        $notification = array(
            'message' => 'Client Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('client')->with($notification);

    }
}
