<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::where('status' , 'patient')->get();
        // dd($patients);
        return view('admin.patients.index' , compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $patient = new User();
        $patient->name = $request->patient_name;
        $patient->email = $request->email;
        $patient->national_id = $request->national_id;
        $patient->password = bcrypt('123123123');
        $patient->status = "patient";
        $patient->save();
        toastr()->success(trans('site.patient-added-successfully'));
        return redirect()->route('patients.index');
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
        $patient = User::findOrFail($id);

        return view('admin.patients.edit' , compact('patient'));
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
        $patient = User::findOrFail($id);
        $patient->update([
            'name' => $request->patient_name ,
            'email'=> $request->email,
            'national_id'=>$request->national_id
        ]);
        toastr()->success('patient information has been Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = User::findOrFail($id);
        $patient->delete();
        toastr()->success('patient has been deleted');
        return redirect()->back();
        // return redirect()->route('hospitals.index');
    }
}
