<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create()
    {
        return view('admin.faq.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Faq Question is Required',
            'answer.required' => 'Faq Answer is Required',
        ]);

        Faq::insert([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = array(
            'message' => 'Faq Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('faq')->with($notification);
    }
    public function index()
    {
        $datas = Faq::latest()->get();
        return view('admin.faq.index', compact('datas'));
    }
    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Faq Question is Required',
            'answer.required' => 'Faq Answer is Required',
        ]);
        $id = $request->id;

        Faq::findOrFail($id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = array(
            'message' => 'Faq Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('faq')->with($notification);

    }

    public function delete($id)
    {
        Faq::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Faq Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function inactive($id)
    {
        Faq::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Faq InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Faq::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Faq Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }
}
