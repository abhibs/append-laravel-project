<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'icon.required' => 'Icon is Required',
            'amount.required' => 'Amount is Required',
        ]);

        $package = new Package;

        $package->name = $request->name;
        $package->icon = $request->icon;
        $package->amount = $request->amount;
        $package->save();
        foreach ($request->description as $key => $packagedetails) {
            $packagedetails = new Detail;
            $packagedetails->package_id = $package->id;
            $packagedetails->condition = $request->condition[$key];
            $packagedetails->description = $request->description[$key];
            $packagedetails->save();
        }

        $notification = array(
            'message' => 'Package Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('package')->with($notification);
    }

    public function index()
    {
        $datas = Package::get();
        return view('admin.package.index', compact('datas'));
    }

    public function edit($id)
    {

        $data = Package::find($id);
        $detail = Detail::where('package_id', $data->id)->get();

        return view('admin.package.edit', compact('data', 'detail'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->name = $request->name;
        $package->icon = $request->icon;
        $package->amount = $request->amount;
        $package->save();

        if ($request->name) {
            $timelines = Detail::where('package_id', $package->id)->get();
            foreach ($timelines as $timeline) {

                $timeline->delete();
            }
            foreach ($request->description as $key => $packagedetails) {
                $packagedetails = new Detail;
                $packagedetails->package_id = $package->id;
                $packagedetails->condition = $request->condition[$key];
                $packagedetails->description = $request->description[$key];
                $packagedetails->save();
            }

        }
        $notification = array(
            'message' => 'Package Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('package')->with($notification);
    }

    public function delete($id)
    {
        Package::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Package Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Package::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Package Inacative Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Package::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Package Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
