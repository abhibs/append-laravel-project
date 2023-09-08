<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1302, 873)->save('storage/portfolio/' . $name_gen);
        $save_url = 'storage/portfolio/' . $name_gen;

        Portfolio::insert([

            'category_id' => $request->category_id,
            'name' => $request->name,
            'url' => $request->url,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('portfolio')->with($notification);

    }

    public function index()
    {
        $datas = Portfolio::get();
        return view('admin.portfolio.index', compact('datas'));
    }

    public function edit($id)
    {

        $categories = Category::latest()->get();
        $data = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('categories', 'data'));
    }

    public function update(Request $request)
    {

        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1302, 873)->save('storage/portfolio/' . $name_gen);
            $save_url = 'storage/portfolio/' . $name_gen;

            Portfolio::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'url' => $request->url,
                'image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('portfolio')->with($notification);


        } else {

            Portfolio::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'url' => $request->url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Portfolio Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('portfolio')->with($notification);

        }

    }

    public function inactive($id)
    {
        Portfolio::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Portfolio InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Portfolio::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Portfolio Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }

    public function delete($id)
    {
        $data = Portfolio::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }
}
