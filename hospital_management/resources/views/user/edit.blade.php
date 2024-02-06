@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Add User</h3>
                <form action="/user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="{{ $user->name }}">
                        @error('name')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter User Email" name="email" value="{{ $user->email }}">
                        @error('email')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>       
    </div>
@endsection