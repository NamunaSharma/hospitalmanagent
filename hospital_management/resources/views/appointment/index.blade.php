 @extends('layouts.app')
 @section('content')
 <div class="container"><div class="row justify-content-center">
 <div class="col-12 mt-3">
     <h3 class="text-center">Appointment List</h3>
    <table class="table">
         <thead>
             <tr>
                  <th>SN</th>
                 <th>Doctor</th>
                 <th>Patient</th>
                 <th>Appointment Date</th>
                 <th>Department</th>
                 <th>Action</th>
             </tr>
     </thead>
 <tbody>
     @foreach($appointments as $appointment)
     <tr>
     <td>{{ $loop->iteration }}</td>
        <td>
         @if($appointment->doctor)
             {{ $appointment->doctor->name }}
             @else
                 N/A
         @endif
    </td>
        <td>
         @if($appointment->patient)
             {{ $appointment->patient->name }}
                @else
                 N/A
             @endif
                </td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>
            @if($appointment->department)
             {{ $appointment->department->name }}
             @else
             N/A
             @endif
            </td>
                <td>
                        <a class="btn btn-info" href="/appointment/{{ $appointment->id }}/edit">Edit</a>
                         <form action="/appointment/{{ $appointment->id }}" method="POST">
                         @csrf
                             @method('DELETE')
                 <button class="btn btn-danger">Delete</button>
                         </form>
                     </td>
                 </tr>
             @endforeach
     </tbody>
     </table>
</div>
 </div>       
</div>@endsection
                                

