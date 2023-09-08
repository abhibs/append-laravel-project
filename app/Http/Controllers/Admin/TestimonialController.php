<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class TestimonialController extends Controller
{
    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',

        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(400, 400)->save('storage/testimonial/' . $name_gen);
        $save_url = 'storage/testimonial/' . $name_gen;

        Testimonial::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $save_url,
            'content' => $request->content,
            'rating' => $request->rating,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Testimonial Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('testimonial')->with($notification);

    }

    public function index()
    {
        $datas = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(400, 400)->save('storage/testimonial/' . $name_gen);
            $save_url = 'storage/testimonial/' . $name_gen;

            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'image' => $save_url,
                'content' => $request->content,
                'rating' => $request->rating,
            ]);
            $notification = array(
                'message' => 'Testimonial Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('testimonial')->with($notification);

        } else {

            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'content' => $request->content,
                'rating' => $request->rating,
            ]);
            $notification = array(
                'message' => 'Testimonial Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('testimonial')->with($notification);

        }

    }

    public function delete($id)
    {

        $data = Testimonial::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function inactive($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Testimonial Inacative Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Testimonial Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
