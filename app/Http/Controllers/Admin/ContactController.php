<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $datas = Contact::latest()->get();
        return view('admin.contact.index', compact('datas'));
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Contact Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}