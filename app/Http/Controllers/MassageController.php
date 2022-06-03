<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    
    public function store(Request $request)
    {
       
            $request->validate([
            'name'           =>   'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'jobtitle'       =>   'required|max:20|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'email'          =>   'required|email',
            'phone'          =>   'required|regex:/(^[-0-9,\/ ]+$)/',
            'dcr'            =>   'required|max:200|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',

        ]);
        // dd($request);

        $clientIP = $request->ip();
         // dd($userid);
        $form_data = array(
            'name'               =>   $request->name,
            'jobtitle'           =>   $request->jobtitle,
            'email'              =>   $request->email,
            'phone'              =>   $request->phone,
            'dcr'                =>   $request->dcr,
            'ip'                 =>   $clientIP,

        );

        Crud::create($form_data);
         return redirect('/#contact')->with('success', 'Message has successfully send our team will be in touch with you');
    }

}
