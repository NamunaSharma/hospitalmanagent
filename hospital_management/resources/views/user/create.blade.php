@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Add User</h3>
                <form action="/user" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter User Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter User Password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Add</button>
                    <br>
                </form>
                <br>
            </div>
        </div> 
        <button class="btn btn-primary" onclick="window.location.href='/user'">Available Users</button>        
    </div>
@endsection