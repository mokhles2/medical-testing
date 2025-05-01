<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
        $hospitals = Hospital::all();
        return view('admin.hospitals.index'  , compact('hospitals'));
    }

    public function create(){
        $branches  = Branch::all();
        return view('admin.hospitals.create'  , compact('branches'));

    }

    public function store(Request $request){
        // return $request;
        // dd($request);
        $hospital = new Hospital();
        // $branch->name = $request->branch_name_ar;
        $hospital->name = $request->hospital_name;
        $hospital->branch_id = $request->branch_id;
        $hospital->save();

        toastr()->success(trans('site.hospital-added-successfully'));
        return redirect()->route('hospitals.index');
    }

    public function destroy($id){
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();
        // return redirect()->back();
        return redirect()->route('hospitals.index');

    }
    public function edit($id){
        // $branch = Branch::get($id);
        $hospital = Hospital::findOrFail($id);
        $branches = Branch::all();


        return view('admin.hospitals.edit' , compact('hospital' , 'branches'));
    }

    public function update(Request $request,  $id){
        $hospital = Hospital::findOrFail($id);
        $hospital->update([
            'name' => $request->hospital_name,
            'branch_id'=>$request->branch_id
        ]);
        toastr()->success('Update Hospital Successfully');

        return redirect()->route('hospitals.index');

    }
}
