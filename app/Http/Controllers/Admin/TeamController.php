<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'content' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Name is Required',
            'designation.required' => 'Designation is Required',
            'content.required' => 'Content is Required',
            'image.required' => 'Image is Required',
        ]);

        $team = new Team;

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->content = $request->content;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg

        Image::make($image)->resize(600, 600)->save('storage/team/' . $name_gen);
        $save_url = 'storage/team/' . $name_gen;

        $team->image = $save_url;
        $team->save();
        foreach ($request->url as $key => $socialmedia) {
            $socialmedia = new SocialMedia;
            $socialmedia->team_id = $team->id;
            $socialmedia->icon = $request->icon[$key];
            $socialmedia->url = $request->url[$key];
            $socialmedia->save();
        }

        $notification = array(
            'message' => 'Team Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('team')->with($notification);
    }

    public function index()
    {
        $datas = Team::latest()->get();
        return view('admin.team.index', compact('datas'));
    }

    public function edit($id)
    {

        $data = Team::find($id);
        $socialmedia = SocialMedia::where('team_id', $data->id)->get();

        return view('admin.team.edit', compact('data', 'socialmedia'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->content = $request->content;

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('storage/team/' . $team->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save(public_path('storage/team/' . $name_gen));
            $team->image = 'storage/team/' . $name_gen;
        }

        $team->save();

        if ($request->name) {
            $timelines = SocialMedia::where('team_id', $team->id)->get();
            foreach ($timelines as $timeline) {

                $timeline->delete();
            }
            foreach ($request->url as $key => $socialmedia) {
                $socialmedia = new SocialMedia;
                $socialmedia->team_id = $team->id;
                $socialmedia->icon = $request->icon[$key];
                $socialmedia->url = $request->url[$key];
                $socialmedia->save();
            }

        }
        $notification = array(
            'message' => 'Team Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('team')->with($notification);
    }



    public function delete($id)
    {

        $img = Team::findOrFail($id);
        @unlink(public_path('storage/team/' . $img->image));
        Team::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Team::findOrFail($id)->update(['status' => 0]);
        // dd($data);
        $notification = array(
            'message' => 'Team Inacative Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Team::findOrFail($id)->update(['status' => 1]);
        // dd($data);
        $notification = array(
            'message' => 'Team Acative Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
