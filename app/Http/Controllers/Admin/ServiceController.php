<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required',
        ], [
            'icon.required' => 'Service Title is Required',
            'title.required' => 'Service Title is Required',
            'content.required' => 'Service Content is Required',
        ]);
        Service::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('service')->with($notification);

    }

    public function index()
    {
        $datas = Service::latest()->get();
        return view('admin.service.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('admin.service.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Service::findOrFail($id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('service')->with($notification);

    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Service::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Service InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Service::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Service Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }
}
