@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Add Patient</h3>
                <form action="/patient" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Patient Name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" placeholder="Enter Patient Address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Patient Phone number" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="disease" class="form-label">Disease</label>
                        <input type="text" class="form-control" id="disease" placeholder="Enter Patient Disease" name="disease">
                    </div>
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor</label>
                        <select class="form-control" id="doctor_id" name="doctor_id">
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <button class="btn btn-primary">Add</button>
                </form>
                <br>
            </div>
        </div> 
        <button class="btn btn-primary" onclick="window.location.href='/patient'">Available Patients</button>        
    </div>
@endsection
