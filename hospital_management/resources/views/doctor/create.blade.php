@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Add Doctor</h3>
                <form action="/doctor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Doctor Name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Doctor Phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Add</button>
                </form>
                <br>
            </div>
        </div>     
        <button class="btn btn-primary" onclick="window.location.href='/doctor'">Available Doctors</button>  
    </div>
@endsection