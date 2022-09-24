<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Address;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function hiddenDisplayForm()
    {
        $branch = Branch::all();

        if($branch->count()>0){
            return redirect('/');
        }
        else{
            return view('Templates.addBranch');
        }
    }

    public function displayForm()
    {
        return view('Templates.addBranch');
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
        $request->validate([
            'branch_name' =>'required',
            'subcity'=>'required',
            'city'=>'required',
            'country'=>'required',
             
        ]);
        
        $savedAddress_1 = $request->subcity;
        $savedAddress_2 = $request->city;
        $savedAddress_3 = $request->country;

        $isAvailable = Address::where('subcity',$savedAddress_1)->where('city',$savedAddress_2)->where('country',$savedAddress_3)->first();

        if($isAvailable == false){
            // creating new address
            $newAddress = new Address();
            $newAddress->subcity = $request->subcity;
            $newAddress->city = $request->city;
            $newAddress->country = $request->country;
            $newAddress->save();
        }
        
        $findAddress = Address::where('subcity',$savedAddress_1)->where('city',$savedAddress_2)->where('country',$savedAddress_3)->first();

        //creating a new Branch
        $newBranch= new Branch();
        $newBranch->branch_name = $request->branch_name;
        $newBranch->address_id = $findAddress->id;
        $newBranch->save();

        return redirect()->back()->with('success','Branch added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeBranch(Request $request)
    {
        $currentBranch=  User::where('role','admin')->where('branch_id',auth()->user()->branch_id)->update(['branch_id' => $request->branch]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
