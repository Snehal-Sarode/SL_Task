<?php

namespace App\Http\Controllers;

use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class LarataskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['contact_data'] = ApplicationForm::orderBy('id','desc')->paginate();
        // $data['contact_data'] = ApplicationForm::orderBy('id','desc')->paginate(10);
        return view('index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'talk_title' => 'required',
            'image' => 'required'
        ]);
    
        $data = new ApplicationForm();
        
        $data->id = $request->input('id');
        $data->firstname = $request->input('firstname');
        $data->lastname = $request->input('lastname');
        $data->email = $request->input('email');
        $data->mobile = $request->input('mobile');
        $data->talk_title = $request->input('talk_title');
        $data->image = $request->input('image'); 
         
         if($request->hasfile('image'))
                    {
                        $image = $request->file('image');
                        $extension =  $image->getClientOriginalExtension();
                        $filename =  'image'.time().'.'. $extension;
                        $image->move('images/', $filename); 
                        $data->image = $filename;
                    }
    
        $data->save();
     
        return redirect()->route('laraform.index')
                        ->with('success','Application submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationForm $data, $id)
    {
        $data = ApplicationForm::find($id);
        //$data =ApplicationForm::all();
        return view("view", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationForm $data, $id)
    {   
        $data = ApplicationForm::find($id);
        return view("edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ApplicationForm::find($id);
        
        $data->firstname = $request->input('firstname');
        $data->lastname = $request->input('lastname');
        $data->email = $request->input('email');
        $data->mobile = $request->input('mobile');
        $data->talk_title = $request->input('talk_title');
         
         if($request->hasfile('image'))
                    {
                        $image = $request->file('image');
                        $extension =  $image->getClientOriginalExtension();
                        $filename =  'image'.time().'.'. $extension;
                        $image->move('images/', $filename); 
                        $data->image = $filename;
                    }
    
        $data->save();
        $request->session()->flash("success","Application Form has been Updated Successfully");

        return redirect()->route('laraform.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationForm $data, $id)
    {
        $data = ApplicationForm::find($id);
        $data->delete();

        return redirect()->route("laraform.index")->with("success", "Application has been Deleted Successfully");
    }
}
