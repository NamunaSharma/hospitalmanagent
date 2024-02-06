@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Edit Patient</h3>
                <form action="/patient/{{ $patient->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Patient Name" name="name" value="{{ $patient->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Patient Address" name="address" value="{{ $patient->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Patient Phone" name="phone" value="{{ $patient->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="disease" class="form-label">Disease</label>
                        <input type="text" class="form-control" id="disease" placeholder="Enter Patient Disease" name="disease" value="{{ $patient->disease }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active" {{ $patient->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $patient->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor</label>
                        <select class="form-control" id="doctor_id" name="doctor_id">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    Old Image: <label for="image"><img src="{{ '/'.$patient->image }}" width="100"></label>
                    <br>
                    <br>

                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>       
    </div>
@endsection
