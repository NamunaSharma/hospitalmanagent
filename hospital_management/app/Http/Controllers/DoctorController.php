<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index')->with(compact('doctors'));
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect('/doctor');
    }

    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect('/doctor');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.edit')->with(compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        Doctor::findOrFail($id)->update([
            'name' => $request->name,
            'phone'=>$request->phone,
        ]);

        return redirect('/doctor');
    }
}
