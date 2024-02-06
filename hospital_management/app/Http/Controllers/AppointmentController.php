<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointment.index')->with(compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $departments = Department::all();
        return view('appointment.create')->with(compact('doctors', 'patients', 'departments'));
    }

    public function store(Request $request)
    {
        Appointment::create([
            "doctor_id" => $request->doctor_id,
            "patient_id" => $request->patient_id,
            "appointment_date" => $request->appointment_date,
            "department_id" => $request->department_id,
        ]);

        return redirect('/appointment');
    }

    // public function destroy($id)
    // {
    //     Appointment::findOrFail($id)->delete();
    //     return redirect('/appointment');
    // }
    public function destroy($id)
{
    Appointment::findOrFail($id)->delete();
    return redirect('/appointment');
}

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all();
        $patients = Patient::all();
        $departments = Department::all();
        return view('appointment.edit')->with(compact('appointment', 'doctors', 'patients', 'departments'));
    }

    public function update(Request $request, $id)
    {
        Appointment::findOrFail($id)->update([
            "doctor_id" => $request->doctor_id,
            "patient_id" => $request->patient_id,
            "appointment_date" => $request->appointment_date,
            "department_id" => $request->department_id
        ]);

        return redirect('/appointment');
    }
}

