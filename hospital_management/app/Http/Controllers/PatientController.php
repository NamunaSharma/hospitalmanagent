<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
//     public function index()
// {
//     $patient = Patient::all();
//     return view('patient.index')->with(compact('patient'));
// }
public function index()
{
    $patients = Patient::all();
    return view('patient.index')->with(compact('patients'));
}


// public function create()
// {
//     // Add any necessary logic specific to patient creation
//     return view('patient.create');
// }
public function create()
{
    $doctors = Doctor::all();
    return view('patient.create')->with(compact('doctors'));
}

public function store(Request $request)
{
    
    // $request->validate([
    //     'name' => 'required',
    //     'address' => 'required',
    //     'phone' => 'required',
    //     'disease' => 'required',
    //     'doctor_id' => 'required',
    //     'image' => 'required',
    //     'status' => 'required',
    // ]);
    $image = $request->image->store('images');
    Patient::create([
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
        'disease' => $request->disease,
        'doctor_id' => $request->doctor_id,
        'status' => $request->status,
        'image' => $image,
    
    ]);

    return redirect('/patient');
}

public function destroy($id)
{
    Patient::findOrFail($id)->delete();
    return redirect('/patient');
}

public function edit($id)
{
    $doctors = Doctor::all();
    $patient = Patient::findOrFail($id);
    return view('patient.edit')->with(compact('patient','doctors'));
}

public function update(Request $request, $id)
{
    $update = [
        "name" => $request->name,
        "doctor_id" => $request->doctor_id,
        "phone"=>$request->phone,
        "status" => $request->status
    ];

    // if($request->image) {
    //     $image = $request->image->store('images');
    //     $update['image'] = $image;
    // }

    Patient::findOrFail($id)->update($update);

    return redirect('/patient');
}

}
