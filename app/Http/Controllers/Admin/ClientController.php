<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(400, 173)->save('storage/client/' . $name_gen);
        $save_url = 'storage/client/' . $name_gen;

        Client::insert([
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Client Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('client')->with($notification);

    }

    public function index()
    {
        $datas = Client::latest()->get();
        return view('admin.client.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Client::findOrFail($id);
        return view('admin.client.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

            Image::make($image)->resize(400, 173)->save('storage/client/' . $name_gen);
            $save_url = 'storage/client/' . $name_gen;

            Client::findOrFail($id)->update([
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Client Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('client')->with($notification);

        }
    }

    public function delete($id)
    {
        $data = Client::findOrFail($id);
        $img = $data->image;
        unlink($img);
        Client::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Client Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Client::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Client InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Client::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Client Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }
}
