<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use Illuminate\Support\Facades\DB;

class MedicalHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index' , 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->status == 'admin'){
            $medicalHistories = MedicalHistory::all();

        }else{
            $medicalHistories = MedicalHistory::where('user_id' , auth()->user()->id)->get();

        }
        return view('admin.medicalHistories.index' , compact('medicalHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = User::all();
        $branches = Branch::all();
        $hospitals = Hospital::all();
        return view('admin.medicalHistories.create' , compact('branches', 'patients','hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            'patient_id' => 'required',
            'branch_id' => 'required',
            'hospital_id' => 'required',
            'age' => 'required|integer',
            'weight' =>'required|integer',
            'temperature' =>'required|integer',
            'blood_pressure'=>'required|integer',
            'sugar_level' =>'required|integer',
            'blood_type' =>'required',
            'prescription' =>'required',
            'status'=>'required'


        ],[
            'patient_id.required' => 'Patient name required',
            'branch_id.required' => 'City name required',
            'hospital_id.required' => 'hospital name required',
            'age.required' => 'age required',
            'age.integer' => 'age must be number',
            'weight.required' =>'weight required',
            'weight.integer' => 'weight must be number',
            'temperature.required' =>'temperature required',
            'temperature.integer' => 'temperature must be number',
            'blood_pressure.required'=>'Blood pressure required',
            'blood_pressure.integer'=>'Blood pressure must be number',
            'sugar_level.required' =>'Suger level required',
            'sugar_level.integer' =>'suger level must be number',
            'blood_type.required' =>'Select blood type',
            'prescription.required' =>'Medical prescription required',
            'status.required'=>'Select patient status'
            






        ]);
        if (!$validator->fails()) {
            $medicalHistory = MedicalHistory::create([
                'age' => $request->age,
                'weight' => $request->weight,
                'temperature' => $request->temperature,
                'blood_pressure' => $request->blood_pressure,
                'sugar_level' => $request->sugar_level,
                'blood_type' => $request->blood_type,
                'blood_test' => $request->blood_test,
                'prescription' => $request->prescription,
                'status' => $request->status,
                'user_id' => $request->patient_id,
                'hospital_id' => $request->hospital_id

            ]);

            toastr()->success('Medical record added successfully');
            return redirect()->route('medicalHistories.index');
        }

        else{
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicalHistory = MedicalHistory::findOrFail($id);

        return view('admin.medicalHistories.show' , compact('medicalHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = User::all();
        $branches = Branch::all();
        $hospitals = Hospital::all();
        $medicalHistory = MedicalHistory::findOrFail($id);
        return view('admin.medicalHistories.edit' , compact('medicalHistory','branches', 'patients','hospitals'));
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
        $medicalHistory = MedicalHistory::findOrFail($id);
        $medicalHistory->update([

            'age' => $request->age,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'blood_pressure' => $request->blood_pressure,
            'sugar_level' => $request->sugar_level,
            'blood_type' => $request->blood_type,
            'blood_test' => $request->blood_test,
            'prescription' => $request->prescription,
            'status' => $request->status,
            'user_id' => $request->patient_id,
            'hospital_id' => $request->hospital_id
        ]);


        toastr()->success(' Medical record updated successfully');
        return redirect()->route('medicalHistories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalHistory = MedicalHistory::findOrFail($id);
        $medicalHistory->delete();
        // return redirect()->back();
        return redirect()->route('medicalHistories.index');
    }

    public function get_hospital($id){
        $hospitals = Hospital::where('branch_id' , $id)->pluck('name' , 'id');

        return json_encode($hospitals);
    }

    public function get_national($id){

        $national = User::where('id', $id)->pluck('national_id' ,'id');

        //  dd($national);

         return json_encode($national);
    }

    public function search(Request $request){
        if( $request->national_id == null){
            $medicalHistories = MedicalHistory::all();
        }else{


        $user = User::where('national_id' , $request->national_id)->first();
        $medicalHistories = MedicalHistory::where('user_id' , $user->id)->get();
        }
        return view('admin.medicalHistories.index' , compact('medicalHistories'));
    }
}
