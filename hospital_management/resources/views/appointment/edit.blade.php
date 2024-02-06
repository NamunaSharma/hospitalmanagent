@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Edit Appointment</h3>
                <form action="/appointment/{{ $appointment->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor</label>
                        <select class="form-control" id="doctor_id" name="doctor_id">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @if($doctor->id == $appointment->doctor_id) selected @endif>{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">Patient</label>
                        <select class="form-control" id="patient_id" name="patient_id">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" @if($patient->id == $appointment->patient_id) selected @endif>{{ $patient->name }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="{{ $appointment->appointment_date }}">
                        @error('appointment_date')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-control" id="department_id" name="department_id">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" @if($department->id == $appointment->department_id) selected @endif>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>       
    </div>
@endsection
