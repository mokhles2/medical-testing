<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function ali(){
        echo "ali";
    }

    public function index(){
        $branches = Branch::all();
        return view('admin.branches.index'  , compact('branches'));
    }

    public function create(){
        return view('admin.branches.create');
    }

    public function store(Request $request){
        

        $validator = validator($request->all(),[

            'branch_name'=>'required',
            



        ],[
            'branch_name.required'=>'City name is required',
            



        ]);
        if(!$validator->fails()) {
            $branch = Branch::create([

            'name'=> $request->branch_name ,


            ]);

            toastr()->success('City Added Successfuly');
            return redirect()->route('branches.index');
        }
        else{
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }


    }

    public function edit($id){
        // $branch = Branch::get($id);
        $branch = Branch::findOrFail($id);

        return view('admin.branches.edit' , compact('branch'));
    }

    public function update(Request $request,  $id){
        $branch = Branch::findOrFail($id);
        $branch->update([
            'name' => $request->branch_name,
        ]);
        toastr()->success('Update City Successfuly');
        return redirect()->route('branches.index');

    }

    public function delete($id){
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->back();

    }


    public function destroy($id){
        $branch = Branch::findOrFail($id);
        $branch->delete();
        toastr()->success('Delete City Successfuly');
        return redirect()->back();


    }
}
