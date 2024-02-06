@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h3 class="text-center">Add Department</h3>
                <form action="/department/{{ $department->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Department Name" name="name" value="{{ $department->name }}">
                        @error('name')
                            <label class="text-danger">* {{ $message }}</label>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>       
    </div>
@endsection