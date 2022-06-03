<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
                
            $data = Crud::latest()->paginate(5);
            return view('index', compact('data')) ;  
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $request->validate([
                'name'            =>  'required|max:30',
                'jobtitle'       =>  'required',
                'email'         =>  'required',
                'phone'         =>  'required',
                'dcr'          =>  'required'
             ]);
        // dd($request);

        $form_data = array(
            'name'              =>   $request->name,
            'jobtitle'          =>   $request->jobtitle,
            'email'            =>   $request->email,
            'phone'            =>   $request->phone,
            'dcr'               =>$request->dcr
        );
  
        Crud::whereId($id)->update($form_data);

        return redirect('/clientmsg')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
 // ---------------- [ Geting all data of that row ID ] ----------------
        $data = Crud::findOrFail($id);
       
// ---------------- [ Delete rest of data ] ----------------
        $data->delete();
        return redirect('clientmsg')->with('success', 'Record is successfully deleted');
    }


    // public function export(){
    //     return redirect('crud')->with('success', 'EXCEL NOT AVALIBLE NOW!!!');
    // }
}
