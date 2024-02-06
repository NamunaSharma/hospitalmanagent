@extends('layouts.app')

@section('content')
    @include('partials.carousal')
    <!-- carousel ends here -->

    <div class="container">
        <h1 class="text-center mt-3">Our Menu</h1>
        <div class="row my-3" data-masonry='{"percentPosition": true }'>

            @foreach($patients as $patient)
            <div class="col-4 my-3">
                <div class="card">
                    <img src="{{ '/'.$patient->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="caard-text">{{ $patient->name }}</p>
                        <p class="card-text">Created At: {{ $patient->created_at }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection