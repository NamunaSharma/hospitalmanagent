@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
            <div class="row w-100 justify-content-center">
                <form class="col-6 p-5 shadow" action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>

                    <button class="btn btn-primary">Login</button>
                </form>
            </div>       
        </div>
    </div>
@endsection
